<?php namespace App\Impl\Reponsitory\User;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/7/2015
 * Time: 12:06 PM
 */
use App\Events\ChangeDataHandle;
use App\Http\Requests\UserFormRequest;
use App\Impl\Service\Cache\CacheInteface;
use App\User;
use Illuminate\Support\Facades\Password;

class EloquentUser implements UserInterface{

    protected $user;

    protected $cache;

    protected $key;

    public function __construct(User $user, CacheInteface $cache){
        $this->user = $user;
        $this->cache = $cache;
        $this->key = 'users_';
    }
    public function all()
    {
        $key = 'users_'.\Input::get('page');
        if($this->cache->has($key)) {
            return $this->cache->get($key);
        }

         return $this->cache->cacheQuery(5, $key, 1);
    }

    public function cachePaginate($page = 1)
    {
        $key = 'users_'.$page;
        if($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $users = $this->user->query()->paginate(5)->items();

        $cached = $this->cache->putPagination($page, 5, $this->user->all()->count(), $users, $key, 10);
        return $cached;
    }

    public function paginate()
    {
        $users = $this->user->query()->paginate(5);
        $users->setPath('/users');
        return $users;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    /**
     * Seach username
     * @param string : $name
     * @return $this
     */
    public function searchName($name)
    {
        return $this->user->query()->where('username', 'LIKE', '%'.$name.'%');
    }

    public function save(UserFormRequest $request)
    {


        if($request->has('id')) {
            $this->user = $this->find($request->get('id'));
        } else {
            $this->user = new User;
        }

        $this->user->username = $request->get('username');
        $this->user->email = $request->get('email');
        $this->user->password = \Hash::make($request->get('password'));
        $this->user->save();
        \Event::fire(new ChangeDataHandle($this->key, ceil($this->user->all()->count() / 5)));
      /*  \Event::fire(new ChangeDataHandle($this->key, ceil($this->user->all()->count() / 5)));*/
    }


}