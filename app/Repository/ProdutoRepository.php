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

    public function create($request)
    {
        if(!$request->pro_imagem)
            return $this->model->create($request->all());

        $imageName = time().'.'.$request->pro_imagem->getClientOriginalExtension();
        $request->pro_imagem->move(public_path('images'), $imageName);

        $request['pro_imagem'] = $imageName;

        return $this->model->create($request->all());
    }


}