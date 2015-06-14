<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reponsitories\Article\ArticleReponsitory;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

	protected $article;

    public function __construct(ArticleReponsitory $article){
        $this->article = $article;
    }

    public function create(){
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    public function show(Article $article){
        return view('articles.show', compact('article'));
    }

    public function index(){
        $articles = $this->article->getPublishedAt();
        return view('articles.index', compact('articles'));
    }

    public function store(RequestArtcile $request){
        /*$article = new Article(); $article->user_id = 1; $article->title = $request->get('title'); $article->body = $request->get('body'); $article->published_at = Carbon::now('Asia/Ho_Chi_Minh');*/
        $this->article->add($request);
        $this->article->save();
        $this->$article->tags()->attach($request->input('tags_list'));
        \Session::flash('flash_message', 'Created');
        return redirect('article');
    }
    public function edit(Request $requests){
        // $article = Article::findOrFail($requests->id);
        $article = $this->article->findArticleById($requests->input('id'));
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }
    public function update(ArticleForm $request, $id){
        // $article = Article::findOrFail($id);
        $this->article->findArticleById($id);
        $this->article->title = $request->get('title');
        $this->article->body = $request->get('body');
        $this->article->published_at = Carbon::now('Asia/Ho_Chi_Minh');
        $this->article->save();
        //$article->tags()->sync($request->input('tags_list'));
        $this->syncTag($this->article, $request->input('tags'));
        return redirect('article');
    } /** * Sync data pivot table * @param Article $article * @param Array $tags */
    public function syncTag(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }
    public function delete(Request $request){
        /*if(\Session::token() !== $request->get('_token'))
        {
            return \Response::json(['msg' => 'Unauthorized attemp to delete data']);
        }*/

        if($request->ajax()) {
             $this->article->Delete($request->input('id'));
            return \Response::json(['status' => 'success']);
        }
    }
    public function test(Request $request){
        if($request->ajax()){ return 'Success'; }
        return 1233;
    }


}
