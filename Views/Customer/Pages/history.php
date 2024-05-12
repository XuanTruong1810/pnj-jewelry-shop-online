<div class="history-customer">
    <h3>Đơn hàng</h3>
    <div class="status">
        <ul>
            <li>Tất cả</li>
            <li>Đơn hàng mới</li>
            <li>Đang giao</li>
            <li>Hoàn tất</li>
            <li>Đã hủy</li>
        </ul>
    </div>
    <div>
        <?php
        for ($i = 0; $i <  3; $i++) {
        ?>
            <div style="margin: 20px 0;">
                <div>
                    <p class="time">Thời gian: 22-02-2024 15:43pm</p>
                </div>
                <div class="history_customer-item">
                    <div class="item_top">
                        <h3>#1190657</h3>
                        <h3>Kênh online</h3>
                    </div>
                    <div class="item_mid">

                        <div class="img">
                            <img src="<?php echo $publicFile ?>/Image/Products/jhhasodjc.png" alt="">

                        </div>
                        <div class="info_Product">
                            <p>Nhẫn vàng 10K đính đá ECZ PNJ XMXMW060984</p>
                            <p>Đơn giá:3.352.000đ <span>X1</span></p>
                        </div>

                    </div>
                    <div class="item_bot">
                        <h3>Tổng tiền: 3.352.000đ</h3>
                        <h3>Đã hủy</h3>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>