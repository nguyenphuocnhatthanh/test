<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Test;
use Illuminate\Http\Request;

class TestsController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $tests = Test::all();
        return view('tests.index', compact('tests'));
    }

    public function search(Request $request){
        $q = $request->get('search');

        $tests = Test::query()->whereRaw('MATCH(title, body) AGAINST(? IN BOOLEAN MODE) ', [$q])->get();
        return view('tests.index', compact('tests'));
    }
}
