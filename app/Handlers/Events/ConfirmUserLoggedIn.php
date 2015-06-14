<?php namespace App\Handlers\Events;

use App\Events\UserLoggedInHandle;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class ConfirmUserLoggedIn {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserLoggedInHandle  $event
	 * @return void
	 */
	public function handle(UserLoggedInHandle $event)
	{
		$event->updateLastLogin();
	}

}
