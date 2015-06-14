<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {

    public function messages(){
        return [
            'required'  => ':attribute không được để trống',
            'email'     => 'Email không hợp lệ',
            'confirmed' => 'Mật khẩu xác nhận không hợp lệ',
            'unique'    => ':attribute :values đã có',
            'in'        => ':values ko ton tai'
        ];
	}

}
