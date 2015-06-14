<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Impl\Eventing\EventGenerator;
use App\Impl\Jobs\JobWasPosted;
use App\Impl\Jobs\JobWasFilled;
class Job extends Model {

    use EventGenerator;

    protected $fillable = ['title', 'description'];
    /**
     * @param $title
     * @param $description
     */
    public static function post($title, $description){
        $job = static::create(compact('title', 'description'));

        $job->raise(new JobWasPosted($job));

        return $job;
	}

    public function archive(){
        $this->delete();
        $this->raise(new JobWasFilled($this));
    }

}
