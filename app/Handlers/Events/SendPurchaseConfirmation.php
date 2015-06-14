<?php namespace App\Handlers\Events;

use App\Events\PodcastWasPurchased;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendPurchaseConfirmation implements ShouldBeQueued{

	use InteractsWithQueue;
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
	 * @param  PodcastWasPurchased  $event
	 * @return void
	 */
	public function handle(PodcastWasPurchased $event)
	{

		dd($event->getUserId());
	}

}
