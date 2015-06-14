<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 10:40 PM
 */

namespace App\Impl\Jobs;

use App\Job;
class JobWasFilled {

    public $job;

    function __construct(Job $job)
    {
        $this->job = $job;
    }

}