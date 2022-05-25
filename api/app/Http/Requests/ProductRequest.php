<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $id = intval(optional($this->route('product'))->id);
        return [
            'name'=>'required|max:255',
            'slug'=>'required|max:300|unique:App\Models\Product,slug'.($id>0?(','.$id):''),
            'price'=>'required',
            'description'=>'required',
            // 'image'=>'image|dimensions:min_width=500,min_height=500',
            'image'=>'image',
            'related_products'=>'sometimes|array',
            'product_sale_type_id'=>'required',
        ];
    }
}
