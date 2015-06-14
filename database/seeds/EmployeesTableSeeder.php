<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 4:04 PM
 */

class EmployeesTableSeeder extends \Illuminate\Database\Seeder{
    public function run(){
        /*$faker = Faker::create();
        foreach(range(1, 30) as $index) {
            \App\Employee::create([
                'birth_date'    => \Carbon\Carbon::now(),
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'gender'        => str_shuffle('MF'),
                'hire_date'     => \Carbon\Carbon::now()
            ]);
        }*/
        Laracasts\TestDummy\Factory::times(30)->create('App\Employee');
    }
}