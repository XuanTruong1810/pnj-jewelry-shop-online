<?php
require_once './Middlewares/Authentication.php';

class Employee extends ControllerBase
{
    private $employeeModel;
    private $AuthModel;
    private $Middleware;
    public function __construct()
    {
        $this->AuthModel  = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->employeeModel = $this->Model("EmployeeModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthModel);
        $EmployeeList = $this->employeeModel->GetAll();
        $this->View("index", "Admin", [
            "Page" => "EmployeeManager",
            "EmployeeList" => $EmployeeList,
        ]);
    }
    public function DeleteEmployee($id)
    {
        $this->Middleware->AuthenticationAdmin($this->AuthModel);
        $this->employeeModel->RemoveEmployee($id);
        $this->index();
    }
}
