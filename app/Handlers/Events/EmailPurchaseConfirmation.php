<?php namespace App\Handlers\Events;

use App\Events\podcastWasPurchased;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailPurchaseConfirmation {

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
	 * @param  podcastWasPurchased  $event
	 * @return void
	 */
	public function handle(podcastWasPurchased $event)
	{
		//
	}

}
