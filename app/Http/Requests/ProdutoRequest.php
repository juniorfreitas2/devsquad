<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pro_nome' => 'required|unique:produtos,pro_nome|max:64',
            'pro_valor' => 'required',
            'pro_descricao' => 'required',
            'pro_cat_id' => 'required'
        ];
    }
}
