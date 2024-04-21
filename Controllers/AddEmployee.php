<?php
class AddEmployee extends ControllerBase
{
    public function index()
    {
        $this->View("index", "admin", [
            "Page" => "AddEmployeeManager",
        ]);
    }
}
