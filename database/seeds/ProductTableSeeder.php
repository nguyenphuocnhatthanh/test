<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 1:19 PM
 */

class ProductTableSeeder extends \Illuminate\Database\Seeder {

    public function run(){
        $faker = \Faker\Factory::create();
        foreach(range(1,15) as $index) {
            $product = new \App\Products();
            $product->product_name = $faker->name;
            $product->img = md5('abcde');
            $product->description = $faker->text();
            $product->quanlity = $index;
            $product->price = rand(10,50);

            $product->save();
        }
    }
}