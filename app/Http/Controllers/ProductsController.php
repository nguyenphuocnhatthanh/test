<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Impl\Reponsitory\Article\ArticleInterface;
use App\Impl\Reponsitory\Product\ProductInterface;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductsController extends Controller {

    protected $products;
    protected $redis;
    public function __construct(ProductInterface $products){
        $this->products = $products;
    }

    public function index(){
        $products = $this->products->all();
        return view('products.index', compact('products'));
	}

    public function edit($id){
        $product = $this->products->find($id);
        return view('products.edit', compact('product'));
    }

    public function save(Requests\ProductFormRequest $request){
        if($this->products->save($request)) return redirect('products')->with('msg', 'Add new product successfull');
        return redirect()->back()->withInput()->withErrors('msg', 'Failed');
    }

    public function create(){
        $product = null;
        return view('products.create', compact('product'));
    }

}
