<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 11:15 AM
 */

namespace App\Impl\Reponsitory\Article;

use App\Article;
use App\Events\ChangeDataHandle;
use App\Impl\Service\Cache\CacheInteface;
use Illuminate\Http\Request;
use Event;

class EloquentArticle implements ArticleInterface {

    protected $article;
    protected $cache;
    protected $key;
    public function __construct(Article $article, CacheInteface $cache){
        $this->article = $article;
        $this->cache = $cache;
        $this->key = md5('article');
    }

    /**
     * Get all data in table Article
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    public function all()
    {
        if($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $this->cache->put($key, $this->article->all(), 10);
        return $this->article->all();
    }

    public function find($id)
    {

    }


    /**
     * Insert or update data in table Article
     * @param Request $request
     */
    public function save(Request $request)
    {
        if($request->has('id')) {
            $this->article->findOrFail($request->get('id'));
        } else {
            $this->article = new Article;
        }

        $this->article->user_id = \Auth::user()->id;
        $this->article->title = $request->get('title');
        $this->article->body = $request->get('body');
        $this->article->save();

        Event::fire(new ChangeDataHandle($this->key));
    }

    public function delete($id)
    {
        // TODO: Implement Delete() method.
    }
}