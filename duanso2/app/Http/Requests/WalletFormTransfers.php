<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletFormTransfers extends FormRequest
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
            'tienchi' => 'required|integer|max:100000000|min:10000'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'không được để trống tiền',
            'integer' => 'chỉ được phép nhập số!',
            'max' => 'tối đa nhập 100.000.000',
            'min' => 'chuyển ít nhất là 10.000'
        ];
    }
}
