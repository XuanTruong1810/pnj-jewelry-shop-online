<?php


class Orders extends ControllerBase
{
    private $OrderModel;
    public function __construct()
    {
        $this->OrderModel = $this->Model("OrderModel");
    }
    public function index()
    {
        $result = $this->OrderModel->GetAll();
        $this->View("index", "Admin", [
            "Page" => "OrderManager",
            "Orders" => $result,
        ]);
    }
}
