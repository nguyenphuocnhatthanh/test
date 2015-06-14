<?php namespace App\Http\Middleware;

use Closure;
use Cache;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CacheMiddlware {


	public function makeCacheKey($url){
		return 'route_'.Str::slug($url);
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		$key = $this->makeCacheKey($request->url());
		if(Cache::has($key)) return Cache::get($key);
		//else Cache::put($key, Response::)

		return $next($request);
	}

}
