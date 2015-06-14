<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/14/2015
 * Time: 8:46 PM
 */

namespace App\Reponsitories\Article;
use App\Article;
use App\Services\CacheInteface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EloquentArticle implements ArticleReponsitory {


    public function FindById($id)
    {
        return Article::find($id);
    }

    public function Save(Request $request)
    {
        if(!$request->has('id')) {
            $article = new Article();
        }else {
            $article = Article::findOrFail($request->get('id'));
        }
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->published_at = Carbon::now('Asia/Ho_Chi_Minh');
        $article->save();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        Article::destroy($id);
    }


    public function getPublishedAt()
    {
        return Article::query()->published()->get();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function All()
    {
        return Article::all();
    }
}