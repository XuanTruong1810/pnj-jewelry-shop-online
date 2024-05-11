<?php
class PurchaseInvoice extends ControllerBase
{
    private $PurchaseInvoiceModel;
    public function __construct()
    {
        $this->PurchaseInvoiceModel = $this->Model("PurchaseInvoiceModel");
    }
    public function index()
    {
        $result = $this->PurchaseInvoiceModel->GetAllPurChaseInvoice();
        $this->View('index', 'Admin', [
            "Page" => "PurchaseInvoiceManager",
            "PurchaseInvoices" => $result,
        ]);
    }
    public function LoadSupplierAPI()
    {
        $result = $this->PurchaseInvoiceModel->LoadSupplierAPI();
        header('Content-type: application/json');
        echo json_encode(["data" => $result]);
    }
    public function Confirm_delivery($id)
    {
        $this->PurchaseInvoiceModel->Confirm_delivery($id);
        $this->index();
    }
}
