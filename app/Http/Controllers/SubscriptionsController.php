<?php namespace App\Http\Controllers;

use App\Events\SubcriptionHandle;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller {

    /**
     * @param Dispatcher $event
     */
    public function upgrade(Dispatcher $event){
        $event->fire('UserUpgradedSubcription');
        return 'User updgrade';
	}

    public function handle(Dispatcher $event){
        $event->fire(new SubcriptionHandle());
        return 'test';
    }
}
