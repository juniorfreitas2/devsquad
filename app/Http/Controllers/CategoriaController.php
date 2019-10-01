<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;

class CategoriaController extends BaseController
{
    public function __construct(CategoriaRepository $categoriaRepository )
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function all(Request $request)
    {
        $categorias = $this->categoriaRepository->getCategoriasFiltered($request->all());
        return Response($categorias, 200);
    }

    public function index(Request $request)
    {
        return view('categorias.index');
    }
}
