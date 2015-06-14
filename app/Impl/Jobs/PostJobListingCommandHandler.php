<?php namespace App\Impl\Jobs;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/18/2015
 * Time: 9:29 PM
 */
use App\Impl\Commands\CommandHandler;
use App\Job;
use App\Impl\Eventing\EventDispatcher;

class PostJobListingCommandHandler implements CommandHandler {

    /**
     * @var EventDispatcher $dispatcher
     */
    protected $dispatcher;

    /**
     * @param Job $job
     * @param EventDispatcher $dispatcher
     */
    function __construct( EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }


    /**
     * Hanlde the command
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $job = Job::post($command->title, $command->description);

        $this->dispatcher->dispatch($job->releaseEvents());
    }

}