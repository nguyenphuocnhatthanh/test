<?php namespace App\Http\CacheFilter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/28/2015
 * Time: 8:39 PM
 */

class CacheFilter {
    public $key;

    public function fetch( Request $request){
        $this->key = $this->makeCache($request->url());
        if(\Cache::has($this->key)) return \Cache::get($this->key);
    }

    public function put(Request $request, Response $response){
        $this->key = $this->makeCache($request->url());

        if(!\Cache::has($this->key)) \Cache::pull($this->key, $response->getContent(), 60);
    }

    protected function makeCache($url) {
        return 'route_'.Str::slug($url);
    }
}