<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 6:47 PM
 */

namespace App\Impl\Eventing;


class EventListener {
    public function handle($event){

        $eventName = (new \ReflectionClass($event))->getShortName();

        $method = 'when'.$eventName;

        if(method_exists($this, $method)) {
            return $this->$method($event);
        }
    }
}