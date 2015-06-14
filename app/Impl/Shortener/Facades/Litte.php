<?php namespace App\Impl\Shortener\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 9:40 AM
 */
class Litte extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'Litte';
    }

}