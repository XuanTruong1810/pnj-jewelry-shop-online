<?php
if (!$data['Customers']) : ?>
    <h1>Không tồn tại khách hàng</h1>
<?php else : ?>
    <table id="Customer" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Chức Năng</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['Customers'] as $customer) : ?>
                <tr>
                    <td><?php echo $customer['CUSTOMERNAME'] ?></td>
                    <td><?php echo $customer['PHONENUMBER'] ?></td>
                    <td><?php echo $customer['EMAIL'] ?></td>
                    <td>
                        <a href="">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init><i class="fa-solid fa-circle-info"></i></button>
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init><i class="fa-solid fa-trash"></i></button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>