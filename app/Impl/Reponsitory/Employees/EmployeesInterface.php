<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 3:44 PM
 */

namespace App\Impl\Reponsitory\Employees;


use App\Impl\Reponsitory\Reponsitory;

interface EmployeesInterface extends Reponsitory{
    public function getPaginator(array $param);
}