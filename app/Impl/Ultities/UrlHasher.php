<?php namespace App\Impl\Ultities;
use Illuminate\Support\Str;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 10:53 AM
 */
class UrlHasher {

    /**
     * length hash
     * @var int
     */
    protected $hashLength = 5;

    /**
     * hash url
     * @param $url
     * @return string
     */
    public function make($url){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $this->hashLength);
    }
}