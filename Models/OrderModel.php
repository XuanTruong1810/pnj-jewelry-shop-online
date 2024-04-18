<?php

class OrderModel extends ModelBase
{
    // Dùng cho Admin
    public function GetAll()
    {
        $query = "SELECT ORDERID,TOTAL,CREATEAT, C.CUSTOMERNAME STATUS FROM orders AS O
                    JOIN customer AS C ON C.CUSTOMERID = O.CUSTOMERID ORDER BY CREATEAT DESC";
        return $this->Query($query, null)->fetchAll();
    }
    public function DetailOrder_GetDetailProduct($id)
    {
        $query = "SELECT P.PRODUCTNAME,SI.DESCRIPTION_SIZE,OD.QUANTITY, OD.TOTAL FROM orderdetail AS OD
                    JOIN orders AS O ON O.ORDERID = OD.ORDERID
                    JOIN product_size AS PZ ON PZ.PRODUCT_SIZEID = OD.PRODUCT_SIZEID
                    JOIN products AS P ON P.PRODUCTID = PZ.PRODUCTID
                    JOIN size AS SI ON SI.SIZEID = PZ.SIZEID
                    WHERE O.ORDERID = ?";
        return $this->Query($query, [$id])->fetchAll();
    }
    public function DetailOrder_GetInfoUser($id)
    {
        $query = "SELECT c.CUSTOMERNAME,c.PHONENUMBER,c.EMAIL,s.SHIPPINGMETHODNAME, o.ADDRESS FROM orders as o
                    JOIN customer as c on c.CUSTOMERID = o.CUSTOMERID
                    JOIN shippingmethods as s on s.SHIPPINGMETHODID = o.SHIPPINGMETHODID,
                    WHERE O.ORDERID = ?";
        return $this->Query($query, [$id])->fetchAll(PDO::FETCH_ASSOC);
    }
    public function DetailOrder_GetPaymentMethod($id)
    {
        $query = "SELECT py.PAYMENTMETHODNAME,pyo.STATUS from paymentmethod_order as pyo
                    JOIN orders as o on o.ORDERID = pyo.ORDERID
                    JOIN paymentmethods as py on py.PAYMENTMETHODID = pyo.PAYMENTMETHODID
                    WHERE o.ORDERID = ?";
        return $this->Query($query, [$id])->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AcceptOrder($id)
    {
        $query = "UPDATE orders set STATUS = 1 WHERE ORDERID = ?";
        return $this->Query($query, [$id]);
    }
    public function ConfirmReceived($id)
    {
        $query = "UPDATE orders set STATUS = 2 WHERE ORDERID = ?";
        return $this->Query($query, [$id]);
    }
    public function CancelOrder($id)
    {
        $query = "UPDATE orders set STATUS = 3 WHERE ORDERID = ?";
        return $this->Query($query, [$id]);
    }
    //Dùng cho người dùng
}
