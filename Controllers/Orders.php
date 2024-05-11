<?php

require_once './Middlewares/Authentication.php';

class Orders extends ControllerBase
{
    private $OrderModel;
    private $AuthModel;
    private $Middleware;
    public function __construct()
    {
        $this->AuthModel  = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->OrderModel = $this->Model("OrderModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthModel);
        $result = $this->OrderModel->GetAll();
        $this->View("index", "Admin", [
            "Page" => "OrderManager",
            "Orders" => $result,
        ]);
    }
}
