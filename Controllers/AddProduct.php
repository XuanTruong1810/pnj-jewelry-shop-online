<?php

class AddProduct extends ControllerBase
{
    public function index()
    {
        $this->View("index", "Admin", [

            "Page" => "AddProductManager",
        ]);
    }
}
