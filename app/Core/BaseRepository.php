<?php

namespace App\Core;

abstract class BaseRepository
{
    protected $model;

    public function __construct(\App\Core\BaseModel $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginate($qtd)
    {
        return $this->model->paginate($qtd);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = null)
    {
        if (!$attribute) {
            $attribute = $this->model->getKeyName();
        }

        $collection = $this->model->where($attribute, '=', $id)->get();

        if ($collection) {
            foreach ($collection as $obj) {
                $obj->fill($data)->save();
            }

            return $collection->count();
        }

        return 0;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function lists($identifier, $field)
    {
        return $this->model->orderBy($identifier, 'desc')->pluck($field, $identifier);
    }

    public function listsOrdem($identifier, $field)
    {
        return $this->model->orderBy($field, 'asc')->pluck($field, $identifier);
    }

    public function search(array $options, array $select = null)
    {
        $query = $this->model;
        foreach ($options as $op) {
            $query = $query->where($op[0], $op[1], $op[2]);
        }

        if (!is_null($select)) {
            $query = $query->select(implode(',', $select));
        }

        return $query->get();
    }

    public function getFillableModelFields()
    {
        return $this->model->getFillable();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function findWhere(array $data)
    {
        return $this->model->where($data);
    }

    public function findWhereIn($input, array $data)
    {
        return $this->model->whereIn($input, $data)->get();
    }

    public function where($field, $type, $value)
    {
        return $this->model->where($field, $type, $value);
    }

    public function whereDate($field, $operator, $date)
    {
        return $this->model->whereDate($field, $operator, $date);
    }
}
