<?php namespace App\Impl\Jobs;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/19/2015
 * Time: 10:32 PM
 */
class JobFilledCommand {
    public $jobId;

    function __construct($jobId)
    {
        $this->jobId = $jobId;
    }

}