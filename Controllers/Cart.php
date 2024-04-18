<?php
class Cart extends ControllerBase
{
    public function index()
    {
        $modelCart = $this->Model("CartModel");
        $Cart = $modelCart->GetCartItems();
        $this->View("index", "Home", [
            "Page" => "Cart",
            "Cart" => $Cart,
        ]);
    }
    public function AddCart()
    {
        $modelCart = $this->Model("CartModel");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productSize = isset($_POST['productSizeID']) ? $_POST['productSizeID'] : "";
            if (!empty($productSize)) {
                $modelCart->AddToCart($productSize, 1);
            }
        }
        $Cart = $modelCart->GetCartItems();
        $this->View("index", "Home", [
            "Page" => "Cart",
            "Cart" => $Cart,
        ]);
    }
    public function DeleteCart()
    {
        $modelCart = $this->Model("CartModel");
        if (isset($_POST["valueDelete"])) {
            $productId = $_POST["valueDelete"];
            $modelCart->RemoveFromCart($productId);
        }
        $Cart = $modelCart->GetCartItems();
        $this->View("index", "Home", [
            "Page" => "Cart",
            "Cart" => $Cart,
        ]);
    }
}
