<?php
function sort_employees_by($column, $display){
    $orderBy = (Request::get('order') == 'asc') ? 'desc' :'asc';
    return link_to_route('employees', $display, ['sort' => $column, 'order' => $orderBy]);

}