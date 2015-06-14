<?php namespace App\Impl\Listeners;
use App\Impl\Jobs\JobWasPosted;
use App\Impl\Eventing\EventListener;
use App\Impl\Jobs\JobWasFilled;
class EmailNotifier extends EventListener {
    
    public function whenJobWasPosted(JobWasPosted $event){
        var_dump('Send confirm email about event: '.$event->job->title);
    }

    public function whenJobWasFilled(JobWasFilled $event){
        var_dump('Send conguratulation email to the employer about job: '.$event->job->title);
    }
}