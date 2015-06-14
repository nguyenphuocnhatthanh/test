<?php namespace App\Impl\Commands;
use Mockery\CountValidator\Exception;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/18/2015
 * Time: 9:17 PM
 */
class CommandTranslator {
    public function toCommandHandler($command){
        $handler = str_replace('Command', 'CommandHandler', get_class($command)); //PostJobListingCommandlder

        if( ! class_exists($handler)) {
            $message = "Command handler [".$handler."] does not exist";
            throw new Exception($message);
        }

        return $handler;
    }
}