<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Impl\Reponsitory\Link\LinkInterface;
use App\Impl\Shortener\Litte;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Impl\Shortener\Exceptions\NonExistenHashException;

class LinksController extends Controller {


    /**
     * @return \Illuminate\View\View
     */
    public function create(){
        return view('links.create');
	}

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        try{
            $hash = Litte::make($request->get('url'));
            dd($hash);
        }catch(ValidationException $e){
            return redirect()->back()->withErrors($e->getMessage())
                             ->withInput();
        }
        return redirect('/links')->with([
            'flash_message' => 'You created successfully. '.link_to($hash),
            'hashed'        => $hash
        ]);
    }

    /**
     * @param $hash
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function translateHash($hash){
        try{
            $url = Litte::getUrlByHash($hash);
            dd($url);
            return redirect($url);
        }catch(NonExistenHashException $e) {
            return redirect('links')->with(['flash_message' => 'Url not hash']);
        }
    }
}
