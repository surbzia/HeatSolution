<?php

namespace App\Http\Requests\Public;

use App\Exceptions\CustomeFrontendException;
use App\Http\Resources\Public\FrontResource;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator;
use Illuminate\Auth\Access\AuthorizationException;

class ProductBySlugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $parameter = $this->route()->parameters;
        $result = Product::where('slug', $parameter['slug'])->exists();
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
