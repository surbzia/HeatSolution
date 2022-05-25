<?php

namespace App\Http\Requests\Public;

use App\Exceptions\CustomeFrontendException;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductByCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if ($request->slug == 'all') {
            return true;
        }
        $result = Product::whereHas('category', function ($query) use ($request) {
            $query->where('slug', $request->slug);
        })->exists();
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
