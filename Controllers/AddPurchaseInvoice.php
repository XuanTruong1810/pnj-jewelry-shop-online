<?php
class AddPurchaseInvoice extends ControllerBase
{
    public function index()
    {
        $this->View("index", "Admin", [
            "Page" => "AddPurchaseinvoiceManager",
        ]);
    }
}
