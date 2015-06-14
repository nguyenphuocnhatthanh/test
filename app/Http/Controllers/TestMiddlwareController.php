<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TestMiddlwareController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('test.index');
	}

    public function test(Request $request){
        return $request->all();
    }
}
