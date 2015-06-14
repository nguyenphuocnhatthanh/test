<?php namespace App\Impl\Commands;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/18/2015
 * Time: 9:30 PM
 */
interface CommandHandler {
    /**
     * Hanlde the command
     * @param $command
     * @return mixed
     */
    public function handle($command);
}