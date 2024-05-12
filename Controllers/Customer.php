<?php

class Customer extends ControllerBase
{
    public function index()
    {
        $this->View("index", "Customer", [
            "Page" => "home"
        ]);
    }
    public function Login()
    {
        $this->View('login', "Customer");
    }
}
