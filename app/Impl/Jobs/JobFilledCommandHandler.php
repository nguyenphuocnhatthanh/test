<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 10:33 PM
 */

namespace App\Impl\Jobs;


use App\Impl\Commands\CommandHandler;
use App\Impl\Eventing\EventDispatcher;
use App\Job;
class JobFilledCommandHandler implements CommandHandler{

    /*
     * @var Job $job
     */
    protected $job;

    /**
     * @var EventDispatcher $eventDispatcher
     */
    protected $eventDispatcher;

    function __construct(Job $job, EventDispatcher $eventDispatcher)
    {
        $this->job = $job;
        $this->eventDispatcher = $eventDispatcher;
    }


    public function handle($command){
        $job = $this->job->findOrFail($command->jobId);
        $job->archive();
        $this->eventDispatcher->dispatch($job->releaseEvents());
    }
}