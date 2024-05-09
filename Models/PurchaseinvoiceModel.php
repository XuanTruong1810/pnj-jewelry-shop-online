<?php
class PurchaseInvoiceModel extends ModelBase
{
    public function GetAllPurChaseInvoice()
    {
        $query = "SELECT p.PURCHASEINVOICEID,p.TOTAL,p.CREATEAT,a.SUPPLIERNAME FROM purchaseinvoices as p
            JOIN suppliers as a ON a.SUPPLIERID = p.SUPPLIERID ";
        return $this->Query(query: $query, values: null)->fetchAll(PDO::FETCH_OBJ);
    }
    public function LoadSupplierAPI()
    {
        $query = "SELECT SUPPLIERID,SUPPLIERNAME FROM suppliers";
        return $this->Query(query: $query, values: null)->fetchAll();
    }
}
