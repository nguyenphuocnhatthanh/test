<?php namespace App\Http\Controllers\Auth;

use App\Events\UserEventHandle;
use App\Events\UserLoggedInHandle;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterForm;
use App\Reponsitories\User\EloquentUser;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;


class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
    protected $redirectTo  = '/test';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

    public function postLogin(Request $request){
        $this->validate($request, [
            'email'  => 'required|email',
            'password'  => 'required'
        ]);
        $activity['active'] = 1;
        $credentials = array_merge($request->only('email', 'password'), $activity);
        if($this->auth->attempt($credentials, $request->has('remember'))) {
            //\Event::fire(new UserEventHandle());
            \Event::fire(new UserLoggedInHandle(new User()));

            return redirect()->intended($this->redirectPath());
        }

        return redirect('/auth/login')->withInput($request->only('email'))
                    ->with('message', 'Email hoac mat khau ko hop le');
    }


    public function postRegister(RegisterForm $registerForm){
        $user = new User();
        $user->username = $registerForm->get('name');
        $user->email = $registerForm->get('email');
        $user->password = \Hash::make($registerForm->get('password'));
        $user->status = md5(rand(1,10000));
        if($user->save()) {

            \Mail::send('auth.mail',array('username'=>$user->name,'link'=>$user->status), function($message) use ($user) {
                $message->to($user->email,$user->username)->subject('Active your account');
            });
            return redirect('auth/login')->with('message', 'Bạn đã đăng ký thành công');
        }

        return redirect()->back()->with('message', 'Lỗi hệ thống');
    }

    public function getLogout(){
        $this->auth->logout();
        return redirect('auth/login');
    }

    public function getActivity($status){
        if($user = User::query()->where('status','=',$status)->update(['status' => '', 'active' => 1])){
            return redirect('auth/active');
        }
        return redirect()->back()->with('message', 'Ma xac nhan ko dung');
    }

    public function getActive(){
        return view('auth.active');
    }



}
