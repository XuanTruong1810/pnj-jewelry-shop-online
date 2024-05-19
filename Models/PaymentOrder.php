<?php
class  PaymentOrder extends ModelBase
{
    public function CreatePaymentOrder($orderID, $payment)
    {
        $query = "INSERT INTO paymentmethod_order VALUES(?,?,?)";
        return $this->Query($query, [$payment, $orderID, null])->rowCount();
    }
    public function SetPaymentStatus($orderID, $status)
    {
        $query = "UPDATE paymentmethod_order SET STATUS=? WHERE ORDERID=?";
        return $this->Query($query, [$status, $orderID])->rowCount();
    }
}
