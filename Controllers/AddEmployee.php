<?php
require_once './Middlewares/Authentication.php';

class AddEmployee extends ControllerBase
{
    private $AuthModel;
    private $Middleware;
    public function __construct()
    {
        $this->AuthModel  = $this->Model("Authentication");
        $this->Middleware = new Middleware();
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthModel);
        $this->View("index", "admin", [
            "Page" => "AddEmployeeManager",
        ]);
    }
}
