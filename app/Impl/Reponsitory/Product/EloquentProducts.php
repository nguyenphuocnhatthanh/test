<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 3:44 PM
 */

namespace App\Impl\Reponsitory\Product;


use App\Http\Requests\ProductFormRequest;
use App\Impl\Service\Cache\CacheInteface;
use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EloquentProducts implements ProductInterface  {

    protected $products;
    protected $cache;

    public function __construct(Products $products, CacheInteface $cache){
        $this->products = $products;
        $this->cache = $cache;
    }

    public function all()
    {
        $key = md5('products');
        if($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $this->cache->put($key, $this->products->all(), 10);
        return $this->products->all();
    }

    public function delete($id)
    {
        $this->products->destroy($id);
    }

    public function save(ProductFormRequest $request)
    {

        if(!$request->has('id')) {
            $products = new Products();
        } else {
            $products = $this->products->findOrFail($request->input('id'));
        }
        $products->product_name = $request->get('product_name');
        $products->description = $request->get('description');
        $image = $request->file('img');
        $fileName = $image->getClientOriginalName();
        $path = public_path('img/'.$fileName);
        //Image::make($image->getRealPath())->resize(200, 200)->save($path);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $products->img = 'img/'.$fileName;
        $products->quanlity = $request->get('quanlity');
        $products->price = $request->get('price');
        $this->cache->deleteCaCheFile(md5('products'));

        return $products->save();

    }

    public function find($id)
    {
        $key = md5('findProduct');
        if($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $products = $this->products->findOrFail($id);
        $this->cache->put($key, $products, 10);
        return $products;
    }
}