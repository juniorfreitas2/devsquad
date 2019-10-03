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
    public function import($request)
    {
        if(!$request->file)
            return false;

        $data = [];
        $files = $this->readCSV($request->file);

        unset($files[0]);

        foreach ($files as $item) {
            $data[] = [
                'pro_nome' => $item[0],
                'pro_cat_id' => $item[1],
                'pro_valor' => $item[2],
                'pro_descricao' => $item[3]
            ];
        }

        return $this->model->insert($data);
    }

    private function readCSV($csvFile)
    {
        $file_handle = fopen($csvFile, 'r');
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file_handle, 10000, ",")) !== FALSE) {
            $num = count($filedata );

            for ($c=0; $c < $num; $c++) {

                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file_handle);

        return $importData_arr;
    }
}