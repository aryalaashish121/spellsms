<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactGroupStoreRequest extends FormRequest
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
            'name' => ['required', 'unique:contact_groups,name', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Contact Group Name Required",
            'name.unique' => "A contact group with same name already exists."
        ];
    }
}
