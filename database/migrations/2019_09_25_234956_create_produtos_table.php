<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('pro_nome', 64)->unique();
            $table->string('pro_descricao');
            $table->string('pro_imagem')->nullable();
            $table->integer('pro_cat_id')->unsigned();
            $table->decimal('pro_valor',10,2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pro_cat_id')->references('cat_id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
