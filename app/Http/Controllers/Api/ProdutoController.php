<?php

namespace App\Http\Controllers\Api;

use App\Core\BaseController;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends BaseController
{
    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function list()
    {
        $produtos = $this->produtoRepository->paginate(10);

        return Response($produtos, 200);
    }


}
