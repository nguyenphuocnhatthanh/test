<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model {

    public function comments(){
        return $this->morphMany('App\Comment', 'commenttable');
	}

}
