<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/15/2015
 * Time: 4:34 PM
 */
namespace App\Reponsitories\User;
use App\Reponsitories\Reponsitory;

interface UserReponitory extends Reponsitory {
    public function paginate();

}