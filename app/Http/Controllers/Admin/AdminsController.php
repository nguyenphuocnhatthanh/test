<?php namespace  App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class AdminsController extends Controller {

    public function getIndex(User $user){
        dd($user);
	}

}
