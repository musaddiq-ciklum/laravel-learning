<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'name' => [
                'required',
                Rule::unique('products')->ignore($id),
                'max:100'],
            'category_id' => 'required',
            'cost_price' => 'required|numeric',
            'sale_price' => 'required|numeric|gt:cost_price',
            'msrp' => '',
            'stock' => 'required|integer',
            'size' => 'required',
            //'image' => 'required_if:id,0',
            'gallery'=>'',
            'short_desc' => 'required|min:5',
            'long_desc' => 'required|min:10',
            'title' => '',
            'meta_desc' => ''
        ];
    }
}
