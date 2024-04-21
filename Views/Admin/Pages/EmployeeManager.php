<h1>Danh Sách nhân viên</h1>
<a href="../../AddEmployee/index/">
    <button type="button" class="btn btn-primary" data-mdb-ripple-init>Thêm Nhân Viên</button>
</a>
<?php
if (!$data['EmployeeList']) : ?>
    <h1>Không tồn tại khách hàng</h1>
<?php else : ?>
    <table id="Employee" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày vào làm</th>
                <th>Lương</th>
                <th>Chức Năng</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['EmployeeList'] as $employee) : ?>
                <tr>
                    <td><?php echo $employee['FULLNAME'] ?></td>
                    <td><?php echo $employee['PHONUMBER'] ?></td>
                    <td><?php echo $employee['EMAIL'] ?></td>
                    <td><?php echo $employee['HIRE_DATE'] ?></td>
                    <td><?php echo $employee['SALARY'] ?></td>
                    <td>
                        <a href="">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init><i class="fa-solid fa-circle-info"></i></button>
                        </a>
                        <a href="../DeleteEmployee/<?php echo $employee['EMPLOYEEID'] ?>">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init><i class="fa-solid fa-trash"></i></button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>