<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/7/2015
 * Time: 1:32 PM
 */

namespace App\Impl\Reponsitory\User;


use App\Http\Requests\UserFormRequest;
use App\Impl\Reponsitory\Reponsitory;

interface UserInterface extends Reponsitory {
    public function paginate();
    public function cachePaginate();
    public function searchName($name);
    public function save(UserFormRequest $request);
}