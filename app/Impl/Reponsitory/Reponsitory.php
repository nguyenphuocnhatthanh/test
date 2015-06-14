<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/1/2015
 * Time: 3:37 PM
 */

namespace App\Impl\Reponsitory;



interface Reponsitory {
    public function all();
    public function delete($id);
    public function find($id);
}