<?php namespace App\Impl\Eventing;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 12:56 PM
 */
use Illuminate\Events\Dispatcher as Event;
use Illuminate\Log\Writer as Log;
class EventDispatcher {

    /**
     * @var Event $event
     */
    protected $event;


    /**
     * @var Log $log
     */
    protected $log;
    /**
     * @param $event
     */
    function __construct(Event $event, Log $log)
    {
        $this->event = $event;
        $this->log = $log;
    }


    /**
     * @param array $events
     */
    public function dispatch(array $events){

        foreach($events as $event) {
            $eventName = $this->getEventName($event);

            $this->event->fire($eventName, $event);
            $this->log->info($eventName.' was fired');
        }
    }

    /**
     * @param $event
     * @return mixed
     */
    public function getEventName($event)
    {
        return str_replace('\\', '.', get_class($event));
    }


}