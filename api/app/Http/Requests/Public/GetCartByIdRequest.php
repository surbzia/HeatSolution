<?php

namespace App\Http\Requests\Public;

use App\Exceptions\CustomeFrontendException;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GetCartByIdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $parameter = $this->route()->cart;
        $result = Cart::where('id', $parameter)->exists();
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
