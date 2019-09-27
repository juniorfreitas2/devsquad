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
        $produtos = $this->produtoRepository->all();

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
            
            if (!$produto) {
                return redirect()->back()->withInput($request->all())->with('error', 'Produto não existe');
            }
            
            return redirect()->route('produtos.index')->with('message', 'Produto Salvo');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
        }
    }

    public function edit($id)
    {
        $produto = $this->produtoRepository->find($id);

        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não existe');
        }

        $categorias = $this->categoriaRepository->all()->pluck('cat_nome', 'cat_id');

        return view('produto.edit', compact('produto','categorias'));
    }

    public function update(ProdutoRequest $request, $id)
    {
        try {
            $produto = $this->produtoRepository->find($id);

            if (!$produto) {
                return redirect()->back()->withInput($request->all())->with('error', 'Produto não existe');
            }

            if (!$produto->update($request->all())){
                return redirect()->back()->withInput($request->all())->with('error', 'Erro ao atualizar');
            }

            return redirect()->route('produtos.index')->with('message', 'Produto atualizado');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
            }
        }

    }

    public function destroy($id)
    {
        try {
            if ($this->produtoRepository->delete($id)) {
                return redirect()->back()->with('message', 'Produto excluido');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir');
            }
            
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
            }
        }
    }
}
