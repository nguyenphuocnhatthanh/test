<?php namespace App\Impl\Jobs;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/18/2015
 * Time: 4:33 PM
 */
class PostJobListingCommand {

    /**
     * @var $title
     */
    public $title;

    /**
     * @var $description
     */
    public $description;

    /**
     * @param $title
     * @param $description
     */
    function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }


}