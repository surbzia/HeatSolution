<?php

namespace App\Http\Requests;

use App\Exceptions\NewsletterExeption;
use App\Models\Newsletter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NewsletterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $newletter = Newsletter::where('email', $request->email)->exists();
        return !$newletter;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $id = intval(optional($this->route('newsletter'))->id);
        // return [
        //     'email'=>'required|max:255|email|unique:App\Models\Newsletter,email'.($id>0?(','.$id):'')
        // ];
        return [
            // 
        ];
    }
    protected function failedAuthorization()
    {
        throw new NewsletterExeption('This email already registerd for subscription');
    }
}
