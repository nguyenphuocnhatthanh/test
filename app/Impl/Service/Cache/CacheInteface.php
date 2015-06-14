<?php namespace App\Impl\Service\Cache;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 10:34 AM
 */

interface CacheInteface {
    /**
     * put cache
     * @param $key
     * @param $values
     * @param null $minutes
     * @return mixed
     */
    public function put($key, $values, $minutes = null);

    /**
     * check key cache
     * @param $key
     * @return mixed
     */
    public function has($key);

    /**
     * get key cache
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * delete Cache
     * @param $key
     * @return mixed
     */
    public function deleteCaCheFile($key);

    public function putPagination($currentPage, $perPage, $total, $items, $key, $minutes);

    public function cacheQuery($perPage, $key, $minutes);
}