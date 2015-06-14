<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/14/2015
 * Time: 8:53 PM
 */
namespace App\Reponsitories;
use Illuminate\Support\ServiceProvider;
class ArticleServiceProvider extends ServiceProvider{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\\Reponsitories\\Article\\ArticleReponsitory', 'App\\Reponsitories\\Article\\EloquentArticle');
    }

}