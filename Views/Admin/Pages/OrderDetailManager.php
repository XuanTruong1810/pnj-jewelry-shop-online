<h1>Chi tiết đơn hàng</h1>
<div class="OrderDetail">
    <div class="left-OrderDetail">
        <table class="table-Detail">
            <thead>
                <th>Tên Sản Phẩm</th>
                <th>Kích Thước</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($data["Products"] as $product) : ?>
                    <tr>
                        <td><?php echo ($product['PRODUCTNAME']) ?></td>
                        <td><?php echo ($product['DESCRIPTION_SIZE']) ?></td>
                        <td>X<?php echo ($product['QUANTITY']) ?></td>
                        <td><?php echo ($product['TOTAL']) ?></td>
                    </tr>
                <?php
                    $total += $product['TOTAL'];
                endforeach; ?>
                <tr>
                    <td colspan="3" style="text-align: left; font-size: 1.2rem; font-weight: bold;">Giảm Giá</td>
                    <td>100.000 VNĐ</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: left;  font-size: 1.2rem; font-weight: bold;">Tổng hóa đơn</td>
                    <td><?php echo $total . "VNĐ"; ?></td>
                </tr>
            </tbody>

        </table>
    </div>
    <div class="right-OrderDetail">
        <div>
            <h2>Thông tin người dùng</h2>
            <p><strong>Tên:</strong> <?php echo ($data['Users']->CUSTOMERNAME) ?></p>
            <p><strong>Email:</strong> <?php echo ($data['Users']->EMAIL) ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo ($data['Users']->PHONENUMBER) ?></p>
        </div>
        <div>
            <h2>Thông tin thanh toán</h2>
            <p><strong>Địa chỉ nhận hàng: </strong><?php echo ($data['Users']->ADDRESS !== null ? htmlspecialchars($data['Users']->ADDRESS) : $data['Users']->SHIPPINGMETHODNAME) ?></p>
            <!-- <p><strong>Phương thức thanh toán: </strong><?php echo ($data["Payment"]->PAYMENTMETHODNAME) ?></p> -->
            <p><strong>Trạng thái thanh toán: </strong>Chưa thanh toán</p>
        </div>
    </div>
</div>
<div style="margin-top: 30px;">
    <h3>
        <a href="../../Orders/index/">
            <i class="fa-solid fa-arrow-left"></i> Quay Lại
        </a>
    </h3>
</div>