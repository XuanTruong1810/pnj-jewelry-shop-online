<?php

class ProductManagerModel extends ModelBase
{
    public function GetAllProduct()
    {
        $query = "SELECT * FROM products WHERE is_delete != 1";
        return $this->Query($query, null)->fetchAll();
    }
    public function DeleteProduct($id)
    {
        $query = "UPDATE PRODUCTS SET is_delete = 1 WHERE PRODUCTID = ?";
        return $this->Query($query, [$id]);
    }
    public function DetailProduct($id)
    {
        $query = "SELECT * FROM products WHERE PRODUCTID = ?";
        return $this->Query($query, $id)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function SearchProduct($keySearch)
    {
        $query = "SELECT * FROM products WHERE PRODUCTNAME LIKE ? AND is_delete != 1";
        return $this->Query($query, ["%" . $keySearch . "%"])->fetchAll();
    }
}
