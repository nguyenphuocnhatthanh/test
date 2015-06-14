<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/15/2015
 * Time: 4:37 PM
 */

namespace App\Reponsitories;
use Illuminate\Http\Request;

interface Reponsitory {
    public function All();
    public function FindById($id);
    public function Save(Request $request);
    public function Delete($id);
}