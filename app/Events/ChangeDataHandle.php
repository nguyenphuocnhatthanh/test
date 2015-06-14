<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use Cache;
class ChangeDataHandle extends Event {

	use SerializesModels;

	protected $key;

	protected $totalPage;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($key, $totalPage = null)
	{
		$this->key = $key;
		$this->totalPage = $totalPage;
	}

/*	public function deleteCache(){
		if(Cache::has($this->key)) Cache::forget($this->key);
	}*/

	public function deleteCachePaginator(){
		if($this->totalPage != 0) {
			for($i = 1; $i < $this->totalPage; $i++) {
				if(Cache::has($this->key.$i)) {
					Cache::forget($this->key.$i);
				}
			}
		}
	}



}
