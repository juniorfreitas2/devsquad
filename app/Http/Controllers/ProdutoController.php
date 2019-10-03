<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;

class ProdutoController extends BaseController
{
    public function __construct(
        ProdutoRepository $produtoRepository,
        CategoriaRepository $categoriaRepository
    ){
        $this->produtoRepository = $produtoRepository;
        $this->categoriaRepository = $categoriaRepository;
    }

    public function all(Request $request)
    {
        $produtos = $this->produtoRepository->getProdutosFiltered($request->all());

        return Response($produtos, 200);
    }

    public function index(Request $request)
    {
        $categorias = $this->categoriaRepository->all()->pluck('cat_nome', 'cat_id');

        return view('produto.index', compact('categorias'));
    }

    public function create()
    {
        $produto = '';
        $categorias = $this->categoriaRepository->all()->pluck('cat_nome', 'cat_id');

        return view('produto.create', compact('categorias', 'produto'));
    }

    public function import(Request $request)
    {
        try {
            $produto = $this->produtoRepository->import($request);

            if (!$produto)
                return Response(['message' =>'Erro ao importar', 500]);

            $request->session()->flash('success', 'Importado com sucesso');

            return Response(['message' =>'Produto importado', 200]);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return Response(['message' =>'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.', 500]);
        }
    }

    public function store(ProdutoRequest $request)
    {
        try {
            $produto = $this->produtoRepository->create($request);

            if (!$produto)
                return Response(['message' =>'Erro ao salvar produto', 500]);

            $request->session()->flash('success', 'Salvo com sucesso');

            return Response(['message' =>'Produto salvo', 200]);
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

    public function show($id)
    {
        $produto = $this->produtoRepository->find($id);

        if (!$produto)
            return Response(['message' =>'Produto não existe', 500]);

        $categorias = $this->categoriaRepository->all()->pluck('cat_nome', 'cat_id');

        return view('produto.show', compact('produto','categorias'));
    }

    public function update(ProdutoRequest $request, $id)
    {
        try {
            $produto = $this->produtoRepository->find($id);

            if (!$produto)
                return Response(['message' =>'Produto não existe', 500]);

            if (!$produto->update($request->all()))
                return Response(['message' =>'Erro ao atualizar Produto', 500]);

            return Response(['message' =>'Produto atualizado', 200]);

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
                return Response(['message' =>'Erro ao  excluir produto', 500]);

            return Response(['message' =>'Produto excluido', 200]);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return Response(['message' =>'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.', 500]);
            }
        }
    }
}
