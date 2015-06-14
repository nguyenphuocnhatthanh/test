<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Impl\Jobs\PostJobListingCommand;
use App\Impl\Commands\CommandBus;
use App\Impl\Jobs\JobFilledCommand;

class JobsController extends Controller {

    /**
     * @var CommandBus $commandBus
     */
    protected $commandBus;

    /**
     *
     */
    public function __construct(CommandBus $commandBus){
        $this->commandBus = $commandBus;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $command =  new PostJobListingCommand($request->get('title'), $request->get('description'));
        $this->commandBus->execute($command);
	}

    /**
     * Set job as filled
     */
    public function delete($jobId){
        $command = new JobFilledCommand($jobId);
        $this->commandBus->execute($command);
    }
}
