<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
             'namePro'=>'required|unique:products,namePro',
             'slug'=>'required|unique:products,slug',
             'image'=>'required|mimes:jpg,bmp,png|max:2048',
             'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate từng ảnh
             'quantity' => 'required|numeric|min:0',
             'price' => 'required|numeric|min:1',
             'discounts' => 'required|numeric|min:0|max:100',
             'status'=> 'required|numeric|min:0|max:1',
             'category_id'=>'required|numeric|min:1',
             'supplier_id'=>'required|numeric|min:1',
             'origin_id'=>'required|numeric|min:1'
        ];
    }
}
