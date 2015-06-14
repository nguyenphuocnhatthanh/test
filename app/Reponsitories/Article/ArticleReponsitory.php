<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/14/2015
 * Time: 8:39 PM
 */

namespace App\Reponsitories\Article;
use App\Reponsitories\Reponsitory;
use Illuminate\Http\Request;

interface ArticleReponsitory extends Reponsitory {
    public function getPublishedAt();
}