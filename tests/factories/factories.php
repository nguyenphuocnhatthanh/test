<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/6/2015
 * Time: 1:03 PM
 */


$factory('App\User', [
    'username'  => $faker->userName,
    'email'     => $faker->email,
    'password'  => $faker->postcode
]);
$factory('App\Report', [
    'date'  => \Carbon\Carbon::now(),
    'amount'    => rand(50,200)
]);

$factory('App\Employee', [
    'birth_date'    => \Carbon\Carbon::now(),
    'first_name'    => $faker->firstName,
    'last_name'     => $faker->lastName,
    'gender'        => str_shuffle('MF'),
    'hire_date'     => \Carbon\Carbon::now()
]);

$factory('App\Role', [
   'name'   => array_rand(['member', 'admin', 'owner'])
]);