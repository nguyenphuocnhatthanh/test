<?php namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Impl\Reponsitory\User\UserInterface;
use App\Reponsitories\User\EloquentUser;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class UsersController extends Controller {

    protected $user;

    public function __construct(UserInterface $user){
        $this->middleware('auth');
        $this->user = $user;
    }

    public function index(Request $request){
        $users = !($request->has('search')) ? $this->user->paginate() : $this->user->searchName($request->get('search'))->paginate(5);
        if($request->has('page') && $request->ajax()) {
            return \Response::json(view('users.pagination', compact('users'))->render());
        }

        $users->setPath('/users');
        return view('users.index', compact('users'));
    }

    public function postSignin(Request $request){

        if(\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->intended('test');
        }
        return \Redirect::back()->withInput()->with('message', 'Mật khẩu hoặc email ko hợp lệ');
    }

    public function find(Request $request){
        $data =  $this->user->searchName($request->input('search'))->get();
        return \Response::json($data);

    }

    public function findById($id){
        $user = $this->user->find($id);
        return view('users.edit', compact('user'));
    }

    public function cachePaginator(){
        $users = $this->user->all();
        return view('users.test', compact('users'));
    }

    public function cache(){

        $page =  \Input::get('page');
        if($page == null) $page = 1;
        $userPagi = $this->user->cachePaginate($page);
        if($userPagi !== false) {
            $users = new LengthAwarePaginator($userPagi->items, $userPagi->total, $userPagi->perPage, $page);
           return view('users.test', compact('users'));
        }
    }

    public function update(Requests\UserFormRequest $request){
        return $this->user->save($request);
    }

}
