<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 1:05 PM
 */

namespace App\Impl\Jobs;


use App\Job;

class JobWasPosted {
    public $job;

    public function __construct(Job $job){
        $this->job = $job;
    }
}