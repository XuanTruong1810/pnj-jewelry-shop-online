<?php
require_once './Middlewares/Authentication.php';
class Admin extends ControllerBase
{
    private $AuthModel;
    private $Middleware;
    public function __construct()
    {
        $this->AuthModel  = $this->Model("Authentication");
        $this->Middleware = new Middleware();
    }
    public function index()
    {
        $check = $this->Middleware->AuthenticationAdmin($this->AuthModel);
        if ($check) {
            $model = $this->Model("ProductManagerModel");
            $data = $model->GetAllProduct();
            $this->View("index", "Admin", [
                "Page" => "ProductsManager",
                "Products" => $data,
            ]);
        } else {
            header("Location: /PNJSHOP/LoginManager/index/");
            exit();
        }
    }
    public function DeleteProduct()
    {
        $productID = $_POST['ProductID'];
        $model = $this->Model("ProductManagerModel");
        $data = $model->DeleteProduct($productID);
        $this->index();
    }
    public function DetailProduct($id)
    {
        $model = $this->Model("ProductManagerModel");
        $data = $model->DetailProduct($id);
        $this->View("index", "Admin", [
            "Page" => "DetailProductManager",
            "Product" => $data,
        ]);
    }
    public function SearchProduct()
    {
        $keySearch = $_POST['keySearch'];
        if (!empty($keySearch)) {
            $model = $this->Model("ProductManagerModel");
            $data = $model->SearchProduct($keySearch);
            $this->View("index", "Admin", [
                "Page" => "ProductsManager",
                "Products" => $data,
            ]);
        } else {
            $this->index();
        }
    }
}
