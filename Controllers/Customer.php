<?php


class Customer extends ControllerBase
{
    private $CustomerModel;
    public function __construct()
    {
        $this->CustomerModel = $this->Model("CustomerModel");
    }
    public function index()
    {
        $result = $this->CustomerModel->GetAll();
        $this->View("index", "Admin", [
            "Page" => "CustomerManager",
            "Customers" => $result
        ]);
    }
}
