<?php
/**
 * Created by PhpStorm.
 * User: SVE
 * Date: 2/6/2015
 * Time: 4:16 PM
 */
use Illuminate\Database\Seeder as Seeder;
use Faker\Factory as Faker;
use App\User as User;
class UsersTableSeeder extends Seeder {
    public function run(){
        $faker = Faker::create();

        foreach(range(1,15) as $index) {
            User::create([
                'email' => $faker->email(),
                'password'  => Hash::make("abcde"),
                'username'  => $faker->userName()
            ]);
        }
    }
} 