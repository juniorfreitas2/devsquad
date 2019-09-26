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

}