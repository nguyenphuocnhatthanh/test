<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/26/2015
 * Time: 9:56 PM
 */
use Faker\Factory as Faker;
class TestTableSeeder extends \Illuminate\Database\Seeder{
    public function run(){
        $faker = Faker::create();

        foreach(range(1,15) as $index) {
            $test = new \App\Test;
            $test->title = $faker->username();
            $test->body = $faker->text();

            $test->save();
        }
    }
}