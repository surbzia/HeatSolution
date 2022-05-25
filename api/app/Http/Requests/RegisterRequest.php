<?php

namespace App\Http\Requests;

use App\Exceptions\CustomeFrontendAuthException;
use App\Exceptions\CustomeFrontendException;
use App\Exceptions\UserRegisterException;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $user = User::where('email', $request->email)->exists();
        return !$user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email|max:255|unique:App\Models\User,email',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:255',
        ];
    }
    protected function failedAuthorization()
    {
        throw new UserRegisterException('user with this email already exist');
    }
}
