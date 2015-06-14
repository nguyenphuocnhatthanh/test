<?php namespace App\Impl\Reponsitory\Link;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 10:08 AM
 */

use App\Link;


class LinkEloquent implements LinkInterface{
    protected  $link;

    public function __construct(Link $link){
        $this->link = $link;
    }

    /**
     * get url hashed
     * @param $hash
     * @return mixed
     */
    public function byHash($hash)
    {
        return $this->link->query()->whereHash($hash)->first();
    }

    /**
     * get url
     * @param $url
     * @return mixed
     */
    public function byUrl($url)
    {
        return $this->link->query()->whereUrl($url)->first();
    }

    public function create(array $data)
    {
        $this->link->create($data);
    }


    public function all()
    {
        // TODO: Implement all() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}