<?php namespace App\Providers;

use App\Events\PodcastWasPurchased;
use App\Handlers\Events\ChangeConfirmation;
use App\Handlers\Events\SendPurchaseConfirmation;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ChangeDataHandle;
class EventServiceProvider extends ServiceProvider {



	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
		'App\Events\PodcastWasPurchased' => [
			'App\Handlers\Events\SendPurchaseConfirmation'
		],
		'App\Events\UserEventHandle@onUserLoggedIn' => [
			'App\Handlers\Events\UpdateLoggedIn'
		],
		'UserUpgradedSubcription' => [
			'App\Listeners\EmailNotifier@whenUserUpgradedSubscription'
		],
		'App\Events\SubcriptionHandle' => [
			'App\Handlers\Events\EmailNotifierEvent'
		],
		'App\Events\UserLoggedInHandle' => [
			'App\Handlers\Events\ConfirmUserLoggedIn'
		],
		/*ChangeDataHandle::class => [
			ChangeConfirmation::class
		],*/
	];

	public function register(){
		\Event::subscribe(new ChangeConfirmation());
	}

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
		/*\Event::listen('App\Events\PodcastWasPurchased', function($events){
			dd($events);
		});
		\Event::listen('App\Events\UserEventHandle@onUserLoggedIn', function($event) {
			dd($event);
		});*/
		$events->listen('App\Events\UserLoggedInHandle@updateLastLogin', function($event) {
			//dd($event);
		});

	}

}
