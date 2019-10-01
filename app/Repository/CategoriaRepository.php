<?php

namespace App\Repository;

use App\Models\Categoria;
use App\Core\BaseRepository;

class CategoriaRepository extends BaseRepository
{
    public function __construct(Categoria $model)
    {
        $this->model = $model;
    }

    public function getCategoriasFiltered($filter)
    {
        $data = $this->model;

        if(isset($filter['cat_nome']) && !empty($filter['cat_nome']))
            $data = $data->where('cat_nome', 'ilike', '%'.$filter['cat_nome'].'%');

        return $data->orderBy('cat_nome','asc')->paginate(10);
    }
}