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
    private function saveBase64Image($base64_image)
    {
        $output_dir = 'Public/Image/Products/';

        $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64_image));


        $new_image_name = uniqid() . '.png';


        $image_path = $output_dir . $new_image_name;

        file_put_contents($image_path, $image_data);

        return $new_image_name;
    }
    private function AddProductSize($productSizes, $productID)
    {
        foreach ($productSizes as $size) {
            $query = " INSERT INTO product_Size VALUES(UUID(),?,?,?,?)";
            $this->Query($query, [$size['sizePrice'], 0, $size['sizeName'], $productID]);
        }
    }
    public function AddProduct($products)
    {
        foreach ($products as $product) {
            $image_paths = [];
            $query = "INSERT INTO products (PRODUCTID,PRODUCTNAME,PRICE,IS_DELETE,IMAGE_1,IMAGE_2,
                IMAGE_3,IMAGE_4,IMAGE_5,CATEGORY_ATTRIBUTES_DETAILID) VALUES (?,?,?,0,?,?,?,?,?,?)";
            foreach ($product['Images'] as $img) {
                foreach ($product['Images'] as $img) {
                    $image_paths[] = self::saveBase64Image($img);
                }
            }
            $uuid = uniqid();
            $this->Query(
                $query,
                [
                    $uuid,
                    $product['ProductName'],
                    $product['ProductPrice'],
                    $image_paths[0] ?? null,
                    $image_paths[1] ?? null,
                    $image_paths[2] ?? null,
                    $image_paths[3] ?? null,
                    $image_paths[4] ?? null,
                    $product['ProductCategoryDetail'],
                ]
            );
            self::AddProductSize($product['Sizes'], $uuid);
        }
    }
    public function GetAllProducts()
    {
        $query = "SELECT P.PRODUCTNAME,ps.QUANTITY,S.DESCRIPTION_SIZE FROM product_size as ps
                JOIN products AS P ON P.PRODUCTID = ps.PRODUCTID
                JOIN SIZE AS S ON S.SIZEID = ps.SIZEID";
        return $this->Query($query, null)->fetchAll();
    }
    public function GetAllProductsUnder10()
    {
        $query = "SELECT P.PRODUCTNAME,ps.QUANTITY,S.DESCRIPTION_SIZE FROM product_size as ps
                    JOIN products AS P ON P.PRODUCTID = ps.PRODUCTID
                    JOIN SIZE AS S ON S.SIZEID = ps.SIZEID
                    WHERE ps.QUANTITY < 10";
        return $this->Query($query, null)->fetchAll();
    }
}
