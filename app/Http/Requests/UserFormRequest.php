<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFormRequest extends Request {

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
		$username = 'unique:users,username';
		$email = 'unique:users,email';
		if($this->get('id') != 0) {

			$username .= ','.$this->get('id');
			$email .= ','.$this->get('id');
		}else {

		}
		return [
		//	'username'	=> 'required|min:3|'.$username,
		//	'email'		=> 'required|email|'.$email,
		//	'password'	=> 'required|min:3|confirmed'
		];
	}

}
