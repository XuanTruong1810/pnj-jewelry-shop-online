<div>
    <div class="header_Employee" style="display: flex; justify-content: space-between;">
        <div>
            <h1>Quản lý sản phẩm</h1>
        </div>
    </div>
    <div style="margin-top: 30px; display: flex; justify-content: space-between;">
        <div>
            <form action="../../AddProduct/index/">
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Thêm sản phẩm</button>
            </form>
        </div>
    </div>
    <div>
        <table id="Data_product" class="table align-middle mb-0 bg-white display" style="width:100%">
            <thead class="bg-light">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data['Products'] as $product) : ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $product['PRODUCTNAME'] ?></p>
                        </td>
                        <td>
                            <span class=""><?php echo $product['PRICE'] ?></span>
                        </td>
                        <td>
                            <a href="../DetailProduct/<?php echo $product['PRODUCTID'] ?>">
                                <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                    Xem chi tiết
                                </button>
                            </a>
                            <form action="../DeleteProduct/" method="post">
                                <input type="hidden" name="ProductID" value="<?php echo $product['PRODUCTID'] ?>">
                                <button type="submit" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

        </table>

    </div>
</div>