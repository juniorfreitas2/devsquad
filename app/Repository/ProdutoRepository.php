<?php

namespace App\Repository;

use App\Models\Produto;
use App\Core\BaseRepository;

class ProdutoRepository extends BaseRepository
{
    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function getProdutosFiltered($filter)
    {
        $data = $this->model;

        if(isset($filter['pro_nome']) && !empty($filter['pro_nome']))
            $data = $data->where('pro_nome', 'ilike', '%'.$filter['pro_nome'].'%');

        return $data->orderBy('pro_nome','asc')->paginate(10);
    }
}