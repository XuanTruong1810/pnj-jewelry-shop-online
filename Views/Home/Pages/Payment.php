<?php
$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$orderID = basename($currentUrl);
?>
<div class="info-cart" style="display: flex;">
    <div class="cart-left">
        <h3>THÔNG TIN GIỎ HÀNG</h3>
        <?php if (!$data['OrderDetail']) : ?>
            <h1 style="font-size: 1.6rem; text-align: center;">Không có sản phẩm trong giỏ hàng</h1>
        <?php else : ?>
            <?php foreach ($data['OrderDetail'] as $item) : ?>
                <div class="item">
                    <div class="img">
                        <img src="../Public/Image/Products/<?php echo $item['IMAGE_1']; ?>" alt="">
                    </div>
                    <div class="info">
                        <div>
                            <h6><?php echo $item['PRODUCTNAME']; ?></h6>
                            <h6>Mã: <?php echo strtoupper($item['PRODUCTSIZE']); ?></h6>
                        </div>
                        <div class="form">
                            <div>
                                <p>Giá</p>
                                <p><?php echo number_format($item['PRICE']); ?>đ</p>
                            </div>
                            <div>
                                <div>
                                    <p>Size dây cổ:</p>
                                </div>
                                <div>
                                    <select name="size" id="size">
                                        <option aria-readonly="true" value="<?php echo $item['SizeName']; ?>"><?php echo $item['SizeName']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <p>Số lượng</p>
                                <input type="number" name="quantity" min="1" id="quantity" value="<?php echo $item['QUANTITY'] ?>">
                            </div>
                        </div>
                        <div>
                            <form action="../DeleteCart/" method="post">
                                <input style="visibility: hidden;" type="text" name="valueDelete" value="<?php echo $item['PRODUCTSIZE']; ?>">
                                <button type="submit">
                                    <p><i class="fa-solid fa-trash"></i>Xóa</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div>
            <div class="pay_temp">
                <div class="pay">
                    <p>Tạm phí</p>
                    <p>2.132.000đ</p>
                </div>
                <div class="pay">
                    <p>Chi phí vận chuyển</p>
                    <p style="font-weight: bold;">Miễn phí</p>
                </div>
            </div>
            <div class="pay" style="margin-top: 10px;">
                <p style="font-weight: bold;">Thành tiền</p>
                <p style="color: red; font-weight: bold;">2.132.000đ</p>
            </div>
        </div>
    </div>
    <div class="cart-right">
        <div class="stepper-wrapper" style="z-index: 0;">
            <div class="stepper-item completed">
                <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                <div class="step-name">Thông tin người mua</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                <div class="step-name">Hình thức nhận hàng</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                <div class="step-name">Đặt hàng</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                <div class="step-name">Thanh toán</div>
            </div>
        </div>
        <div>
            <div style="display: flex; justify-content: space-between;">
                <button id="PaymentShipping" type="button" class="btn btn-primary" data-mdb-ripple-init>Thanh toán khi nhận hàng</button>
                <button id="momo" type="button" class="btn btn-primary" data-mdb-ripple-init>Thanh toán qua MOMO</button>
                <form action="../../Payment/PaymentOnlineATM/<?php echo $orderID ?>" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">
                    <button id="atm" type="submit" class="btn btn-primary" data-mdb-ripple-init>Thanh toán qua ngân hàng</button>
                </form>
            </div>
        </div>
    </div>
</div>