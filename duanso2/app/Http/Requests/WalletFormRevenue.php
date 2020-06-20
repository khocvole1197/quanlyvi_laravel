<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletFormRevenue extends FormRequest
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
    //form revenue
    public function rules()
    {
        return [
            'tienthu' => 'required|integer|max:100000000|min:10000',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'không được để trống tiền',
            'description.required' => 'không được để trống ghi chú ',
            'integer' => 'chỉ được phép nhập số!',
            'max' => 'tối đa nhập 100.000.000',
            'min' => 'chuyển ít nhất là 10.000'
        ];
    }

}
