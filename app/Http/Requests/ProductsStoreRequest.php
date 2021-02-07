<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'sku'  => 'required',
            'description' => 'required',
            'price'  => 'required',
            'base_url' => 'required',
            'code' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A Prpduct Name is required',
            'sku.required'  => 'A sku is required',
            'description.required' => 'A description is required',
            'price.required'  => 'A proce is required',
            'base_url.required' => 'A url is required',
            'code.required'  => 'A code is required'  
        ];
    }
}
