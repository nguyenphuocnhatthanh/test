<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskForm extends Request {

    protected $redirectRoute = 'tasks.create';

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
            'task'  => 'required'
		];
	}

    public function forbiddenResponse(){
        return $this->redirector->to('/');
    }

}
