<?php

class OrderDetail extends ControllerBase
{
    public function OrderDetailID($id)
    {
        $model = $this->Model("OrderModel");
        $Products = $model->DetailOrder_GetDetailProduct($id);
        $Users = $model->DetailOrder_GetInfoUser($id);
        $Payment = $model->DetailOrder_GetPaymentMethod($id);
        $this->View("index", "Admin", [
            "Page" => "OrderDetailManager",
            "Products" => $Products,
            "Users" => $Users,
            "Payment" => $Payment,
        ]);
    }
}
