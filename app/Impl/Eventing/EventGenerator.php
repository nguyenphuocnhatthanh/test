<?php namespace App\Impl\Eventing;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 12:50 PM
 */

trait EventGenerator {

    protected $pendingEvent = [];

    public function raise($event){
        $this->pendingEvent[] = $event;
    }

    public function releaseEvents(){
        $events = $this->pendingEvent;
        $this->pendingEvent = [];

        return $events;
    }
}