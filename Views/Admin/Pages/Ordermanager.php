<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<form action="../../AddOrder/index/">
    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Tạo Đơn Hàng</button>
</form>
<?php if (!$data['Orders']) : ?>
    <h1>Không tồn tại hóa đơn</h1>
<?php else : ?>
    <table style="font-size: 1.3rem;" id="Data_OrderManager" class="stripe" style="width:100%">
        <thead>
            <tr>
                <th>Tên Khách Hàng</th>
                <th>Số điện thoại</th>
                <th>Ngày Tạo</th>
                <th>Tổng Hóa Đơn</th>
                <th>Trạng Thái</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['Orders'] as $order) : ?>

                <tr>
                    <td><?php echo ($order['CUSTOMERNAME']) ?></td>
                    <td><?php echo ($order['PHONENUMBER']) ?></td>

                    <td><?php echo DateTime::createFromFormat('Y-m-d H:i:s.u', $order['CREATEAT'])->format('d-m-Y g:ia') ?></td>
                    <td><?php echo number_format(($order['TOTAL'])) . ' đ' ?></td>
                    <td><?php echo ($order['STATUS']) ?></td>
                    <td>
                        <button class="btn btn-danger">Hủy đơn hàng</button>
                        <a href="../../OrderDetail/OrderDetailID/<?php echo $order['ORDERID'] ?>">
                            <button class="btn btn-info">Xem chi tiết</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    <?php endif ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.7.0/js/dataTables.autoFill.min.js"></script>
    <script>
        new DataTable('#Data_OrderManager', {
            layout: {
                bottomEnd: {
                    paging: {
                        boundaryNumbers: false
                    }
                }
            }
        });
    </script>