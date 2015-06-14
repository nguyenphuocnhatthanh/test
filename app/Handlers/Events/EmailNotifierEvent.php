<?php namespace App\Handlers\Events;

use App\Events\SubcriptionHandle;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailNotifierEvent {

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
	 * @param  SubcriptionHandle  $event
	 * @return void
	 */
	public function handle(SubcriptionHandle $event)
	{
		$event->whenUserUpgradedSubscription();
		var_dump($string = $event->getString());
	}

}
