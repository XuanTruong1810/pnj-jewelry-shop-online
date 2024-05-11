<?php
class AddPurchaseInvoice extends ControllerBase
{
    private $ProductModel;
    private $PurchaseInvoiceManagerModel;
    public function __construct()
    {
        $this->ProductModel = $this->Model('ProductManagerModel');
        $this->PurchaseInvoiceManagerModel = $this->Model('PurchaseInvoiceModel');
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
        $this->PurchaseInvoiceManagerModel->CreatePurchaseInvoice($jsonData);
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "Successfully created purchase invoice",
            "status" => "success"
        ]);
    }
}
