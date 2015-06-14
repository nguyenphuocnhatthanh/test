<?php namespace App\Impl\Reponsitory\Product;
use App\Http\Requests\ProductFormRequest;
use App\Impl\Reponsitory\Reponsitory;

/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 3:39 PM
 */

interface ProductInterface extends Reponsitory {
    public function save(ProductFormRequest $request);
}