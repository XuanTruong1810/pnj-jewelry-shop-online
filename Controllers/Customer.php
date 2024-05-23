<?php

class Customer extends ControllerBase
{
    public function index()
    {

        $model = $this->Model("Authentication");
        $decode = $model->GenerateTokenUser($_COOKIE['AuthenticationUser']);
        $ModelCustomer = $this->Model("CustomerModel");
        $result = $ModelCustomer->GetCustomerByID($decode->IDUser);
        $this->View("index", "Customer", [
            "Page" => "home",
            "customer" => $result,
        ]);
    }
    public function CreateAccount()
    {
        $this->View("index", "Customer", [
            "Page" => "CreateAccount"
        ]);
    }
    public function Login()
    {
        $this->View('login', "Customer");
    }
    public function History()
    {
        $model = $this->Model("Authentication");
        $decode = $model->GenerateTokenUser($_COOKIE['AuthenticationUser']);
        $modelOrder = $this->Model('OrderModel');
        $result = $modelOrder->GetHistoryOrder($decode->IDUser);
        $this->View("index", "Customer", [
            "Page" => "History",
            "History" => $result,
        ]);
    }
    public function CreateAccountAPI()
    {
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
        $model = $this->Model('CustomerModel');
        $result = $model->UpdateCustomer($jsonData['CUSTOMERNAME'], $jsonData["PHONENUMBER"], "", $jsonData['EMAIL']);
        if ($result) {
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sucess",
                "status" => 200
            ]);
        }
    }
}
