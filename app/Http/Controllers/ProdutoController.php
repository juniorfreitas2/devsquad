<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends BaseController
{
    public function __construct(
        ProdutoRepository $produtoRepository,
        CategoriaRepository $categoriaRepository
    ){
        $this->produtoRepository = $produtoRepository;
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index()
    {
        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = $this->categoriaRepository->all()->pluck('cat_nome', 'cat_id');

        return view('produto.create', compact('categorias'));
    }

    public function store(ProdutoRequest $request)
    {
        try {
            $produto = $this->produtoRepository->create($request->all());

            if (!$produto)
                return Response(['message' =>'Produto não existe', 500]);

            return redirect()->route('produtos.index')->with('message', 'Produto Salvo');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return Response(['message' =>'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.', 500]);
        }
    }

    public function edit($id)
    {
        $produto = $this->produtoRepository->find($id);

        if (!$produto)
            return Response(['message' =>'Produto não existe', 500]);

        $categorias = $this->categoriaRepository->all()->pluck('cat_nome', 'cat_id');

        return view('produto.edit', compact('produto','categorias'));
    }

    public function update(ProdutoRequest $request, $id)
    {
        try {
            $produto = $this->produtoRepository->find($id);

            if (!$produto)
                return Response(['message' =>'Produto não existe', 500]);


            if (!$produto->update($request->all())){
                return redirect()->back()->withInput($request->all())->with('error', 'Erro ao atualizar');
            }

            return redirect()->route('produtos.index')->with('message', 'Produto atualizado');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return Response(['message' =>'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.', 500]);
            }
        }

    }

    public function destroy($id)
    {
        try {

            if (!$this->produtoRepository->delete($id))
                return Response(['message' =>'Produto excluido', 200]);

            return Response(['message' =>'Erro ao  excluir produto', 500]);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return Response(['message' =>'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.', 500]);
            }
        }
    }
}
