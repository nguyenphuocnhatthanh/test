<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/17/2015
 * Time: 10:22 PM
 */

namespace App\Impl\Flash;


use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('flash', 'App\Impl\Flash\FlashNotifier');
    }
}