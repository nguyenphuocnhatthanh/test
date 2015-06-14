<?php namespace App\Impl\Shortner;
use Illuminate\Support\ServiceProvider;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 9:40 AM
 */
class LitteServiceProvider extends ServiceProvider{

   /**
    * Register the service provider.
    *
    * @return void
    */
   public function register()
   {
        $this->app->bind('Litte', 'App\\Impl\\Shortener\\LitteService');
   }
}