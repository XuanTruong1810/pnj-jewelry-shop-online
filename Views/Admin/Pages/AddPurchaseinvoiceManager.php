<h1>Nhập hàng</h1>
<div style="display: flex; align-items: center;">
    <p>Chọn nhà cung cấp</p>
    <select name="" id="supplier"></select>
</div>
<div>
    <div style="display: flex; justify-content: space-between;">
        <div style="margin-right: 30px; width: 700px;">
            <h5>Sản phẩm</h5>
            <div>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>Thêm vào hóa đơn</button>
            </div>
            <table id="PurchaseInvoice">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id=""></th>
                        <th>Tên sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Số lượng trong kho</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['Products'] as $product) : ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo ($product['PRODUCTNAME']) ?></td>
                            <td><?php echo ($product['DESCRIPTION_SIZE']) ?></td>
                            <td><?php echo ($product['QUANTITY']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div style="width: calc(100% - 630px);">
            <h5>Gợi ý nhập hàng</h5>
            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Thêm vào hóa đơn</button>

            <div>
                <table id="PurchaseInvoiceB">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th>Tên sản phẩm</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng trong kho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['ProductsUnder10'] as $product) : ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?php echo ($product['PRODUCTNAME']) ?></td>
                                <td><?php echo ($product['DESCRIPTION_SIZE']) ?></td>
                                <td><?php echo ($product['QUANTITY']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <h3>Hóa đơn nhập hàng</h3>
        <table id="PurchaseInvoiceA">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Kích cỡ</th>
                    <th>Số lượng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sản phẩm 1</td>
                    <td>19</td>
                    <td>30</td>
                    <td>Xóa</td>
                </tr>
            </tbody>
        </table>
        <div>
            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Tạo hóa đơn</button>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script>
    new DataTable('#PurchaseInvoice');
    new DataTable('#PurchaseInvoiceA');
    new DataTable('#PurchaseInvoiceB');
</script>
<script>
    $.ajax({
        type: "GET",
        url: "http://<?php echo $_SERVER['HTTP_HOST'] ?>/PNJSHOP/PurchaseInvoice/LoadSupplierAPI/",
        dataType: "json",
        success: function(response) {
            console.log(response.data);
            const data = response.data;

            data.forEach(value => {
                const option = document.createElement("option");
                option.setAttribute('value', value.SUPPLIERID)
                option.innerText = value.SUPPLIERNAME;
                document.querySelector("#supplier").appendChild(option);
            })
        }
    });
</script>