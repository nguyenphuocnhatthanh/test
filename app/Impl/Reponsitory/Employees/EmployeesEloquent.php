<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 3:45 PM
 */

namespace App\Impl\Reponsitory\Employees;


use App\Employee;

class EmployeesEloquent implements EmployeesInterface {

    protected $employee;

    public function __construct(Employee $employee){
        $this->employee = $employee;
    }
    
    public function getPaginator(array $param)
    {
        return ($param['sort'] != null  && $param['order'])
            ? $this->employee->query()->orderBy($param['sort'], $param['order'])->paginate(5)
            : $this->employee->query()->paginate(5);
       /* return ($param['sort'] != null  && $param['order']) ? $this->employee->query()->orderBy($param['sort'], $param['order'])
            : $this->employee->all();*/
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}