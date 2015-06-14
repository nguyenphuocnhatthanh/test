<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/28/2015
 * Time: 10:50 PM
 */

namespace App\Http\CacheFilter;


use App\Article;
use App\Reponsitories\Article\EloquentArticle;
use App\Services\CacheInteface;
use Illuminate\Http\Request;

class CacheArticles {

    protected $article;
    protected $cache;
    public function __construct(EloquentArticle $article, CacheInteface $cache){
        $this->article = $article;
        $this->cache = $cache;
    }

    public function all(){
        $key = md5('all');
        if($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $this->cache->put($key, $this->article->All(), 60);
   }


}