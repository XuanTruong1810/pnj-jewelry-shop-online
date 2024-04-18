<?php

class OrderDetail extends ControllerBase
{
    public function OrderDetailID($id)
    {
        $model = $this->Model("OrderModel");
        $result = $model->DetailOrder_GetDetailProduct($id);
        $this->View("index", "Admin", [
            "Page" => "OrderDetailManager",
            "result" => $result,
        ]);
    }
}
