<div class=" nav_Customer col-sm-2" style="height: 100vh; position: fixed; background-color: white;">
    <div class="Customer_header">
        <div class="img">
            <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/01/Icon.png" alt="asdasd">
        </div>
        <div>
            <h3>My PNJ</h3>
        </div>
    </div>
    <div>
        <ul>
            <li>
                <a href="../../Employee/index/"><i class="fa-solid fa-users"></i> Quản lý Nhân Viên</a>
            </li>
            <li>
                <a href="../../Orders/index/"><i class="fa-solid fa-cart-shopping"></i> Quản lý Đơn Hàng</a>
            </li>
            <li>
                <a href="../../PurchaseInvoice/index/"><i class="fa-solid fa-cart-shopping"></i> Quản lý Nhập Hàng</a>
            </li>
            <li>
                <a href="../../Admin/index/"><i class="fa-solid fa-box"></i> Quản lý Sản Phẩm</a>
            </li>
            <li>
                <a href="../../CustomerManager/index/"><i class="fa-solid fa-user"></i> Quản lý Khách Hàng</a>
            </li>
            <li>
                <a href="?page=products"><i class="fa-solid fa-chart-line"></i>Thống Kê</a>
            </li>
            <li>
                <button>
                    <i class="gg-log-out"></i>
                </button>
            </li>
        </ul>
    </div>
</div>
<link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
<script>
    document.querySelector('button').addEventListener('click', () => {
        $.ajax({
            type: "post",
            url: "http://localhost:8080/PNJSHOP/AuthenticationAdmin/AdminLogout/",
            success: function(response) {
                console.log(response);
                if (response.status == 200) {
                    window.location.href = '/PNJSHOP/LoginManager/index/';
                }
            }
        });
    });
</script>