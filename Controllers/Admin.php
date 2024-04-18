<?php

class Admin extends ControllerBase
{
    public function index()
    {
        $model = $this->Model("ProductManagerModel");
        $data = $model->GetAllProduct();
        $this->View("index", "Admin", [
            "Page" => "ProductsManager",
            "Products" => $data,
        ]);
    }
    public function DeleteProduct()
    {
        $productID = $_POST['ProductID'];
        $model = $this->Model("ProductManagerModel");
        $data = $model->DeleteProduct($productID);
        $this->index();
    }
    public function DetailProduct($id)
    {
        $model = $this->Model("ProductManagerModel");
        $data = $model->DetailProduct($id);
        $this->View("index", "Admin", [
            "Page" => "DetailProductManager",
            "Product" => $data,
        ]);
    }
    public function SearchProduct()
    {
        $keySearch = $_POST['keySearch'];
        if (!empty($keySearch)) {
            $model = $this->Model("ProductManagerModel");
            $data = $model->SearchProduct($keySearch);
            $this->View("index", "Admin", [
                "Page" => "ProductsManager",
                "Products" => $data,
            ]);
        } else {
            $this->index();
        }
    }
}
