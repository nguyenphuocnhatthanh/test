<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



get('employees', ['as' => 'employees', 'uses' => 'EmployeesController@index']);

/*Event::listen('user.login', function($user) {
	var_dump($user->toArray());
});
Route::get('/', function() {

	Event::fire('user.login', App\User::all());
});
*/
/*Event::subscribe('UserEventHandler');

class UserEventHandler {
	public function subscribe($event){
		$event->listen('user.logout', 'UserEventHandler@onLogout');
	}

	public function onLogout(){
		echo 'The user just';
	}
}
get('/', function() {
	Event::fire('user.logout');
});*/
/*Event::listen('illuminate.query', function($query) {
	var_dump($query);
});*/
get('/user/upgrade', 'SubscriptionsController@upgrade');
get('/user/handle', 'SubscriptionsController@handle');
interface BarInterface{}
class Bar implements BarInterface{
	/*public $baz;

	public function __construct(Baz $baz){
		$this->baz = $baz;
	}*/
}
Route::get('/bar', function(BarInterface $bar){
	dd($bar);
});
$this->app->bind('BarInterface', 'Bar');
/*App::bind('BarInterface', function(){
	return new Bar;
});*/

get('tests', 'TestsController@index');
post('tests/fulltext', 'TestsController@search');

get('/', 'WelcomeController@index');

get('article/test', 'ArticlesController@test');
get('article/create', 'ArticlesController@create');
post('article', ['uses' =>'ArticlesController@store', 'as' => 'articlecreate']);

/*get('/auth/activity/{code}', function($code){

    return \App\User::query()->where('status','=',$code)->first();
})->where(['code' => '([\w]+)']);*/
Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);
post('home/image', ['as' => 'home.image', 'uses' => 'HomeController@store']);
post('home/crop', ['as' => 'cropImage', 'uses' => 'HomeController@crop']);
get('home/flash', 'HomeController@flash');
get('home/flash/{flash}', 'HomeController@getflash');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::resource('tasks', 'TaskController');
/*
Route::controller('test', 'Admin\AdminsController');*/

Route::get('test', array('uses' => 'TestMiddlwareController@index'));
//post('test/test', ['as' => 'midd' ,'uses' =>'TestMiddlwareController@test', 'middleware' => 'old']);
//Route::controller('users', 'UsersController');
post('test/test', ['as' => 'midd' ,'uses' =>'TestMiddlwareController@test', 'middleware' => 'old']);
get('article', 'ArticlesController@index');
get('article/{article}', 'ArticlesController@show');
get('article/{id}/edit', 'ArticlesController@edit');
post('article/update/{id}', ['uses' => 'ArticlesController@update', 'as' => 'article.update'])->where('id', '([\d]+)');
post('article/delete', ['uses' => 'ArticlesController@delete', 'as' => 'article.delete',
	'middleware' => 'csrf']);

/*Route::bind('article', function($slug)
{
	return \App\Article::query()->where('title',$slug)->first();
});*/


/*------------------UserController-------------------------*/

get('users', 'UsersController@index');
get('users/find', 'UsersController@find');
get('users/cache', 'UsersController@cachePaginator');
get('users/paginator', 'UsersController@cache');
get('users/edit/{id}', ['uses' => 'UsersController@findById'])->where('id', '([\d]+)');
post('user/edit', ['as' => 'users.update', 'uses' => 'UsersController@update']);

/*------------------ End UserController-------------------------*/
get('cache', function() {
	$values = Cache::remember('article', 1000, function() {
		return \App\Article::all();
	});

	return $values;
})->before('beforeCache');


get('content', 'ContentsController@home');

Route::group(['prefix' => 'products', 'middleware' => 'auth'], function() {
	get('/', 'ProductsController@index');
	get('/edit/{id}', 'ProductsController@edit')->where('id', '([\d]+)');
	post('/edit', ['as' => 'product.edit', 'uses' =>'ProductsController@save']);
	get('/create', 'ProductsController@create');
//	post('/create', ['as' => 'product.create', 'uses' => 'ProductsController@save']);
});
get('create/cache', function() {
	if(Cache::has('test'))
		return Cache::get('test');
	$data = ['test', 'cache'];
	Cache::put('test', $data, 10);
	return $data;
});
get('delete/cache', function() {
	if(Cache::has('test')){
		Cache::forget('test');
		return 'abcde';
	}

	return 1;
});

get('image', function() {
	$img = Image::canvas(500, 500, '#ff000');
	$response = Response::make($img->encode('jpg'));
	
	$response->header('Content-type', 'image/jpg');
	return $response;
});

get('remember', function() {
	$cache = Cache::remember('users', 10, function() {
			return \App\User::all();
	});
	return 123;
});

get('remember/users', function() {
	if(Cache::has('users')) {
		$users = Cache::get('users');
		$paginator = new Illuminate\Pagination\LengthAwarePaginator($users, $users->count(), 5);
		dd($paginator);
	}
});

\App\Order::saving(function($model) {
	return false;
	//dd($model);
});
get('order', function(){
	\App\Order::create(['title' => 'My order']);
});
get('reports', ['uses' => 'ReportsController@daily', 'middleware' => 'auth']);
get('pivot', function() {
	/*return \App\Post::query()->where(function($query) {
		$query->where('id', '=', 1);
	})->get();*/
	/*$post = App\Post::query()->where('created_at', '>=', \Carbon\Carbon::now()->subWeek());
	return $post->get();*/
	/*$post = \App\Post::date()->get();
	return $post;*/
	return \App\Post::groupBy('day')->get([
		DB::raw('DATE(created_at) as day'),
		DB::raw('COUNT(*) as count')
	]);
});


abstract class AbstractClass
{
	// Force Extending class to define this method
	abstract protected function getValue();
	abstract protected function prefixValue($prefix);

	// Common method
	/*public function printOut() {
		print $this->getValue() . "\n";
	}*/
}

class ConcreteClass1 extends AbstractClass
{
	protected function getValue() {
		return "ConcreteClass1";
	}

	public function display() {
		echo $this->getValue();
	}
	public function prefixValue($prefix) {
		return "{$prefix}ConcreteClass1";
	}
}

/*class ConcreteClass2 extends AbstractClass
{
	public function getValue() {
		return "ConcreteClass2";
	}

	public function prefixValue($prefix) {
		return "{$prefix}ConcreteClass2";
	}
}*/

get('abstract', function() {
	$test = new ConcreteClass1;
	return $test->display();
});


get('/links', ['uses' => 'LinksController@create']);
post('/links', ['uses' => 'LinksController@store']);
get('links/{hash}', 'LinksController@translateHash');
get('/csrf', ['middleware' => 'csrf', function(){
	return 'abcde';
}]);
get('memcache', function() {
	dd(new Memcached);
	Cache::tags('hobbies')->put('chess', 'chess', 10);
});
get('getcache', function() {
	dd(Cache::tags('hobbies')->get('chess'));
});

get('/', function()  {
	/*$queue = Queue::push('LogMessage', ['message' => 'Time'.time()]);
	return $queue;*/
	/*dd(Session::get('flash_notification.message'));
	\App\Impl\Flash\Flash::message('flash_notification.message', 'Error');*/
	dd(\App\User::first()->hasRoles('temp'));
	dd(\App\User::with('roles')->first()->toArray());

});
class LogMessage{
	public function fire($job , $data){
		File::append(app_path().'queue.txt', $data['message'].PHP_EOL);
		$job->delete();
	}
}
Event::listen('App.Impl.Jobs.JobWasPosted', 'App\Impl\Listeners\EmailNotifier');
Event::listen('App.Impl.Jobs.JobWasFilled', 'App\Impl\Listeners\EmailNotifier');
get('/jobs/store', 'JobsController@store');
get('/jobs/delete/{id}', 'JobsController@delete');

class Foo{ }

get('/', function() {
	$className = 'Foo';
	$reflector = new ReflectionClass($className);
	dd($reflector->getName());
});
