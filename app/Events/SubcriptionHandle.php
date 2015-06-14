<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class SubcriptionHandle extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	public function whenUserUpgradedSubscription(){
		$this->emailAdmin();
	}

	private function emailAdmin() {
		var_dump('emailing the admin');
	}

	public function getString(){
		return 'String';
	}

}
