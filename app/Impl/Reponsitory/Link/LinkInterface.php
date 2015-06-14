<?php namespace App\Impl\Reponsitory\Link;
use App\Impl\Reponsitory\Reponsitory;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 10:07 AM
 */
interface LinkInterface extends Reponsitory{
    public function byHash($hash);
    public function byUrl($url);
    public function create(array $data);
}