<?php

class AddProduct extends ControllerBase
{
    public function index()
    {
        $this->View("index", "Admin", [
            "Page" => "AddProductManager",
        ]);
    }
    public function SearchProduct()
    {
        $keySearch = $_POST['keySearch'] ?? "";
        $modelProduct = $this->Model("ProductManagerModel");
        $result = $modelProduct->SearchProduct($keySearch);
        header('Content-type: application/json');
        echo json_encode(["data" => $result]);
    }
}
