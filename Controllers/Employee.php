<?php

class Employee extends ControllerBase
{
    private $employeeModel;
    public function __construct()
    {
        $this->employeeModel = $this->Model("EmployeeModel");
    }
    public function index()
    {
        $EmployeeList = $this->employeeModel->GetAll();
        $this->View("index", "Admin", [
            "Page" => "EmployeeManager",
            "EmployeeList" => $EmployeeList,
        ]);
    }
    public function DeleteEmployee($id)
    {
        $this->employeeModel->RemoveEmployee($id);
        $this->index();
    }
}
