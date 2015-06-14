<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $date = ['published_at'];

    /*public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date,'Asia/Ho_Chi_Minh');
	}*/

    public function scopePublished($query){
        return $query->where('published_at', '<=', Carbon::now('Asia/Ho_Chi_Minh'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    /**
     * Select Selected
     * @return mixed
     */
    public function getTagsListAttribute(){
        return $this->tags->lists('id');
    }

 /*   public function getTempAttribute(){
        return "abcd";
    }*/
}
