<?php
class Home extends ControllerBase
{
    public function index()
    {
        $modelProduct = $this->Model("Product");
        $pagination = $modelProduct->Pagination();
        $products = $modelProduct->GetAllProduct();
        $this->View("index", "Home", [
            "Page" => "Product",
            "Pagination" => $pagination,
            "Products" => $products
        ]);
    }
    public function Category($id)
    {
        $modelProduct = $this->Model("Product");
        $products = $modelProduct->GetProductByCategoryID($id);
        $pagination = $modelProduct->Pagination();
        $this->View("index", "Home", [
            "Page" => "Product",
            "Pagination" => $pagination,
            "Products" => $products
        ]);
    }
}
