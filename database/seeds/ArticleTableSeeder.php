<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/28/2015
 * Time: 1:14 PM
 */

class ArticleTableSeeder extends \Illuminate\Database\Seeder {
    public function run(){
        $faker = \Faker\Factory::create();
        foreach(range(1,15) as $index) {
            $article = new \App\Article();
            $article->user_id = $index;
            $article->title = $faker->locale;
            $article->body = $faker->text();
            $article->published_at = \Carbon\Carbon::now();

            $article->save();
        }
    }
}