<?php

namespace App\Http\Requests;

use finfo;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
            'mobile' => ['required'],
            'name' => ['nullable', 'string'],
            'email' => ['nullable',],
            'company' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            'contact_group_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mobile.required' => 'Mobile Number is required',
            'mobile.unique' => 'Mobile Number already exists',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'name.required' => 'Name is required',
            'company.required' => 'Company Name is required',
            'address.required' => 'Address is required',
            'note.required' => 'Note is required',
            'contact_group_id.required' => 'Contact Group is required',
        ];
    }
}
