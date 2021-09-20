<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountManagerStoreRequest extends FormRequest
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
            'name'=>['required','string'],
            'email'=>['email'],
            'phone'=>['required','unique:account_managers,phone'],
            'whatsapp'=>['numeric','nullable'],
            'facebook_url'=>['nullable'],
            'image'=>'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>"Account manager name is required.",
            'name.string'=>"Only string value supported for name.",
            'email.email'=>"Enter vaild email address",
            'phone.required'=>"Contact no. field is required.",
            
        ];
    }
}
