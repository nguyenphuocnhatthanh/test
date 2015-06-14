<?php namespace App\Impl\Flash;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/17/2015
 * Time: 10:17 PM
 */
class Flash extends Facade{
    protected static function getFacadeAccessor(){
        return 'flash';
    }
}