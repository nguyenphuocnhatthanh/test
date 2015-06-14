<?php namespace App\Impl\Service\Cache;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 10:35 AM
 */
use App\User;
use Cache;
use Illuminate\Database\Eloquent\Builder;

class MyCache implements CacheInteface {
    /**
     * put cache
     * @param $key
     * @param $values
     * @param null $minutes
     * @return mixed
     */
    public function put($key, $values, $minutes = null)
    {
        Cache::put($key, $values, $minutes);
    }

    /**
     * check key cache
     * @param $key
     * @return mixed
     */
    public function has($key)
    {
        return Cache::has($key);
    }

    /**
     * get key cache
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if($this->has($key)) {
            return Cache::get($key);
        }
    }

    /**
     * delete Cache
     * @param $key
     * @return mixed
     */
    public function deleteCaCheFile($key)
    {
        if($this->has($key)) {
            Cache::forget($key);
        }
    }

    public function putPagination($currentPage, $perPage, $total, $items, $key, $minutes = null) {
        $cached = new \stdClass();

        $cached->currentPage = $currentPage;
        $cached->perPage = $perPage;
        $cached->total = $total;
        $cached->items = $items;

        $this->put($key, $cached, $minutes);
        return $cached;
    }


    public function cacheQuery($perPage, $key, $minutes)
    {
         $users = Cache::remember($key, $minutes, function() use($perPage){
                $user =new User;
                return $user->query()->paginate($perPage);
        });
        return $users;
    }
}