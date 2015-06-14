<?php namespace App\Handlers\Events;

use App\Events\UserEventHandle;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class UpdateLoggedIn {

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
	 * @param  UserEventHandle  $event
	 * @return void
	 */
	public function handle(UserEventHandle $event)
	{
		dd($event);
	}

}
