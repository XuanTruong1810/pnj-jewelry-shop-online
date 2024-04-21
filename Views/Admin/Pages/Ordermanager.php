<form action="../../AddOrder/index/">
    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Tạo Đơn Hàng</button>
</form>
<?php if (!$data['Orders']) : ?>
    <h1>Không tồn tại hóa đơn</h1>
<?php else : ?>
    <table id="example" class="stripe" style="width:100%">
        <thead>
            <tr>
                <th>Tên Khách Hàng</th>
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
                    <td><?php echo ($order['CREATEAT']) ?></td>
                    <td><?php echo ($order['TOTAL']) ?></td>
                    <td><?php echo ($order['STATUS']) ?></td>
                    <td>
                        <button>Xóa</button>
                        <button></button>
                        <a href="../../OrderDetail/OrderDetailID/<?php echo $order['ORDERID'] ?>">
                            <button>Xem chi tiết</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    <?php endif ?>