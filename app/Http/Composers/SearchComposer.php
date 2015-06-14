<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/25/2015
 * Time: 6:13 PM
 */

namespace App\Http\Composers;


use Illuminate\Contracts\View\View;

class SearchComposer {
    public function compose(View $view){
        $inputData = \Request::all();
        $hiddenFormData = '';
        unset($inputData['page']);


        foreach($inputData as $inputName => $inputValue) {

            if(is_array($inputValue)) {
                if(count($inputValue) > 0) {
                    foreach($inputValue as $nestedValue) {
                        $hiddenFormData .= \Form::hidden($inputName.'[]', $nestedValue);
                    }
                }
            }else {
                $hiddenFormData .= \Form::hidden($inputName, $inputValue);
            }
        }
        unset($inputData['search']);
        $view->with('hiddenPaginatorInputFields', $hiddenFormData);
    }
}