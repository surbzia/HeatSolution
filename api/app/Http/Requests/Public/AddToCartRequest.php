<?php

namespace App\Http\Requests\Public;

use App\Exceptions\CustomeFrontendException;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AddToCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $result = Product::where('id', $request->product_id)->exists();
        return $result;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            // 
        ];
    }
    protected function failedAuthorization()
    {
        throw new CustomeFrontendException();
    }
}
