<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Impl\Reponsitory\Article\ArticleInterface;
use Illuminate\Http\Request;

class ContentsController extends Controller {

    protected $article;
    public function __construct(ArticleInterface $article){
        $this->article = $article;
    }

    public function home(){

        $articles = $this->article->all();

        return view('content.index', compact('articles'));
    }

}
