<?php namespace App\Http\Controllers;

use App\Impl\Flash\Flash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
        $this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['link'] = null;
		if(\Session::has('img')) {
			$data['link'] = \Session::get('img');
		}
		$data['modal'] = (\Session::get('modal') == null) ? 'false' : 'true';
		return view('home', compact('data'));
	}

	public function store(Request $request){
		$fileName = '';
		if(\Input::hasFile('image')) {

			$image = $request->file('image');
			$fileName = $image->getClientOriginalName();
			$image->move('img', $fileName);
			$path = public_path('img/' . $fileName);
			$int_image = Image::make($path);
			$int_image->resize(300, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path);
			\Session::put('modal', 'true');

		} else {
			$path = $request->get('img_bckp');
		}
		if($fileName != null) \Session::put('img', $fileName);
		return \Redirect::route('home');

	}

	public function crop(Request $request){
		\Session::forget('modal');
		$img = \Session::get('img');

		$path = public_path('img/'.$img);
		$image = Image::make($path);

		$image->crop(
					intval($request->get('w')),
					intval($request->get('h')),
					intval($request->get('x')),
					intval($request->get('y'	)
				)
		);
		$image->fit($request->get('w'))->save($path);
		return redirect()->route('home');
	}

	public function flash(){
		return view('message');
	}

	public function getflash($message){

		Flash::error('flash_notification.message', $message);
		return redirect('home/flash');
	}
}
