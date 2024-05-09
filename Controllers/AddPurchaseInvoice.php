<?php
class AddPurchaseInvoice extends ControllerBase
{
    private $ProductModel;
    public function __construct()
    {
        $this->ProductModel = $this->Model('ProductManagerModel');
    }
    public function index()
    {
        $this->View("index", "Admin", [
            "Page" => "AddPurchaseinvoiceManager",
            "Products" => $this->ProductModel->GetAllProducts(),
            "ProductsUnder10" => $this->ProductModel->GetAllProductsUnder10()
        ]);
    }
    public function CreatePurchaseInvoice()
    {
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
    }
}
