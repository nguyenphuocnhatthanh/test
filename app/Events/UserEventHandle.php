<?php namespace App\Events;

use App\Events\Event;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserEventHandle extends Event {

	use SerializesModels;
	protected $user;
//	protected $auth;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	public function onUserLoggedIn(\Auth $auth){
		if($auth->check()) {
			$this->user = new User();
			$this->user->updateLastLoggedIn($auth->user()->id);
		}
	}

}
