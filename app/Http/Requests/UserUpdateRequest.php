<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'account_type'=>'required',
            'company_name'=>'required|min:5',
            'name'=>'required|min:5',
            'login_id'=>'required|min:8|unique:users,login_id,except'.$this->id,
            'email'=>'required|unique:users,email,except'.$this->id,
            'password'=>'required|min:8|max:20',
            'phone'=>'required|numeric|min:6',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'company_name.required'=>'Company name is required.',
            'name.required'=>'Customer name is required',
            'login_id.required'=>'Login id is required',
            'email.required'=>'Customer email is required',
            'password.required'=>'Password is required',
            'phone.required'=>'Customer phone number is required',
            'address.required'=>'Customer address is required',

            'company_name.min'=>'Company name must have minimum 6 char.',
            'name.min'=>'Customer name must have atleast 6 char.',
            'login_id.min'=>'Login id must have atleast 8 char.',
            'password.min'=>'Password must have atleast 8 char.',
            'phone.min'=>'Phone number must have atleast 6 char.',
            'phone.max'=>'Phone number must be less than 20 char.',
            

            'login_id.unique'=>'Login id is already taken',
        ];
    }
}
