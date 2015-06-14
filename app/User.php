<?php namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	/**
	 * The Relation Table Article
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function articles(){
		return $this->hasMany('App\Article');
	}

	public function posts(){
		return $this->hasMany('App\Post');
	}

	public function updateLastLoggedIn($userId){
		$user = User::findOrFail($userId);
		$user->last_login = Carbon::now();
		$user->save();
	}

	public function projects(){
		return $this->hasMany('App\Project');
	}

	public function roles(){
		return $this->belongsToMany('App\Role')->withTimestamps();
	}

	public function hasRoles($name){
		foreach($this->roles as $role) {
			if($role->name == $name) {
				return true;
			}
		}

		return false;
	}
}
