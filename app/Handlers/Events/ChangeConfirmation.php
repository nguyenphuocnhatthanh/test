<?php namespace App\Handlers\Events;

use App\Events\ChangeDataHandle;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class ChangeConfirmation {

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
	 * @param  ChangeDataHandle  $event
	 * @return void
	 */
	public function handle(ChangeDataHandle $event)
	{

		$event->deleteCachePaginator();

	}

	public function changeData($event){
		$event->deleteCachePaginator();
	}

	public function subscribe($events){
		$events->listen('App\Events\ChangeDataHandle', 'App\Handlers\Events\ChangeConfirmation@changeData');
	}

}
