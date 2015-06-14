<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Impl\Reponsitory\Employees\EmployeesInterface;
class EmployeesController extends Controller {

    protected $employees;

    public function __construct(EmployeesInterface $employees){
        $this->employees = $employees;
    }

    public function index(Request $request){
        $sort = $request->has('sort') ? $request->get('sort') : null;
        $order = $request->get('order');
        $employees = $this->employees->getPaginator(compact('sort', 'order'));

        return view('employees.index', compact('employees'));
	}

}
