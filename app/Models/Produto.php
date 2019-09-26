<?php
namespace App\Models;

use App\Core\BaseModel;

class Produto extends BaseModel
{
    protected $primaryKey = 'pro_id';

    protected $table = 'produtos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pro_nome',
        'pro_descricao',
        'pro_imagem',
        'pro_cat_id',
        'pro_valor'
    ];

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'cat_id', 'pro_cat_id');
    }
}