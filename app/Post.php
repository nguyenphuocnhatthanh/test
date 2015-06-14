<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public function user(){
        return $this->belongsTo('App\User');
	}

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function scopeDate($query){
        return $query->where('created_at', '>=', Carbon::now()->subWeek());
    }
}
