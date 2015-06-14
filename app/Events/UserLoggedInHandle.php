<?php namespace App\Events;

use App\Events\Event;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserLoggedInHandle extends Event {

	use SerializesModels;

	protected $user;
	protected $auth;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
		//$this->auth = $auth->user();
	}

	public function updateLastLogin(){
		if(\Auth::check()) {
			$this->user->updateLastLoggedIn(\Auth::user()->id);
		}
	}


}
