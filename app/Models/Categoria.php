<?php
namespace App\Models;

use App\Core\BaseModel;

class Categoria extends BaseModel
{

    protected $primaryKey = 'cat_id';

    protected $table = 'categorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_nome'
    ];

    public function produtos()
    {
        return $this->hasMany('App\Models\Produto', 'pro_cat_id', 'cat_id');
    }
}