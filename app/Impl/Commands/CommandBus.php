<?php namespace App\Impl\Commands;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/18/2015
 * Time: 9:23 PM
 */
use Illuminate\Foundation\Application;
use App\Impl\Commands\CommandTranslator;
class CommandBus {

    /**
     * @var CommandTranslator $commandTranslator
     */
    protected $commandTranslator;

    /**
     * @var Application $app
     */
    protected $app;

    /**
     * @param $commandTranslator
     * @param $app
     */
    function __construct(CommandTranslator $commandTranslator,Application $app)
    {
        $this->commandTranslator = $commandTranslator;
        $this->app = $app;
    }


    /**
     * @param $command
     * @return mixed
     */
    public function execute($command){
        $handler = $this->commandTranslator->toCommandHandler($command);
        return $this->app->make($handler)->handle($command);
    }
}