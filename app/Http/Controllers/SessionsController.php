<?php namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;

class SessionsController extends Controller {

    private $auth;
    public function __construct(Auth $auth){
        $this->auth = $auth;
    }
    public function store(){
        $this->auth->attempt();

	}

    public function destroy(Filesystem $filesystem){
        $filesystem->delete();
    }

}
