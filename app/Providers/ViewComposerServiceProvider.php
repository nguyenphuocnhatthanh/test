<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->composerNavigation();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 *
     */
	public function composerNavigation()
	{
		view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer');
		view()->composer('users.index', 'App\Http\Composers\SearchComposer');
//		view()->composer('partials.nav', function ($view) {
//			$view->with('latest', Article::latest()->first());
//		});
	}

}
