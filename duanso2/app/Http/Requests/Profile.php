<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Profile extends FormRequest
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
            //
            'name' => 'required|min:5|max:10',
            'password' => 'required|min:5',
            'repassword' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'không được để trống :attribute',
            'min' => ':attribute tối thiểu 5 ký tự',
            'max' => ':attribute tối đa 10 ký tự'
        ];
    }
}
