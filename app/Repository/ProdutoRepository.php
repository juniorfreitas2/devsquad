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

}