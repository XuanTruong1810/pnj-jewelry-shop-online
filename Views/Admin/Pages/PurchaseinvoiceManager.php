<div>
    <h1>
        Hóa đơn nhập hàng

    </h1>
    <div>
        <a href="../../AddPurchaseInvoice/index/">
            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Thêm đơn hàng</button>
        </a>
    </div>
    <div>
        <table id="PurchaseInvoice" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Ngày tạo</th>
                    <th>Tổng tiền</th>
                    <th>Nhà cung cấp</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["PurchaseInvoices"] as $result) : ?>
                    <tr>
                        <td><?php echo $result['PURCHASEINVOICEID'] ?></td>
                        <td><?php echo $result['CREATEAT'] ?></td>
                        <td><?php echo $result['TOTAL'] ?></td>
                        <td><?php echo $result['SUPPLIERNAME'] ?></td>
                        <td>
                            <a href="#"> <button type="button" class="btn btn-primary" data-mdb-ripple-init>Xem chi tiết</button></a>
                            <a href="#"> <button type="button" class="btn btn-primary" data-mdb-ripple-init>Xác nhận giao hàng</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script>
    new DataTable('#PurchaseInvoice');
</script>