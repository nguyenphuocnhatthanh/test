<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/16/2015
 * Time: 10:03 AM
 */

namespace App\Reponsitories\User;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EloquentUser implements UserReponitory {

    private $limit =5;
    //private $page = 1;
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function All()
    {
        return User::all();
    }

    public function getByPage($page){
        $users = $this->user->skip($this->limit * ($page - 1))->take($this->limit)->get();
        $result = new \StdClass();
        $result->page = $page;
        $result->limit = $this->limit;
        $result->totalItems = $this->user->count();
        $result->items = $users->all();
        return $result;
    }

    public function paginate()
    {


        $users =User::query()->paginate(5);
        $users->setPath('/users');
        return $users;
    }

    public function FindById($id)
    {
        // TODO: Implement FindById() method.
    }

    public function Save(Request $request)
    {
        // TODO: Implement Save() method.
    }

    public function Delete($id)
    {
        // TODO: Implement Delete() method.
    }

    public function searchName($name){
        $users = User::query()->where('username', 'LIKE', '%'.$name.'%');
        return $users;
    }
}