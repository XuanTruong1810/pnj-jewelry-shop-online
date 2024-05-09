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
}
