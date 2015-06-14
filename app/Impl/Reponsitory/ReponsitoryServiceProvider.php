<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 11:34 AM
 */

namespace App\Impl\Reponsitory;


use App\Article;
use App\Impl\Reponsitory\Article\EloquentArticle;
use App\Impl\Reponsitory\Employees\EmployeesEloquent;
use App\Impl\Reponsitory\Link\LinkEloquent;
use App\Impl\Reponsitory\Product\EloquentProducts;
use App\Impl\Reponsitory\User\EloquentUser;
use App\Impl\Service\Cache\MyCache;
use App\Products;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Security\Core\User\User;

class ReponsitoryServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('App\\Impl\\Reponsitory\\Article\\ArticleInterface', function($app) {
            return new EloquentArticle(new Article(), new MyCache());
        });

        $this->app->bind('App\\Impl\\Reponsitory\\Product\\ProductInterface', function($app) {
            return new EloquentProducts(new Products(), new MyCache());
        });

        $this->app->bind('App\\Impl\\Reponsitory\\User\\UserInterface', function($app) {
            return new EloquentUser(new \App\User, new MyCache());
        });
        $this->app->bind('App\Impl\Reponsitory\Link\LinkInterface', function(){
            return new LinkEloquent(new \App\Link);
        });

        $this->app->bind('App\Impl\Reponsitory\Employees\EmployeesInterface', function(){
            return new EmployeesEloquent(new \App\Employee);
        });

    }
}