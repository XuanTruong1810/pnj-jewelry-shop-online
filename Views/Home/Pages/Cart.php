<div class="checkout-cart">
    <div class="back-home">
        <a href="../../Home/index/">
            <button><i class="fa-solid fa-caret-left"></i> Tiếp tục mua hàng</button>
        </a>
    </div>
    <div class="info-cart">
        <div class="cart-left">
            <h3>THÔNG TIN GIỎ HÀNG</h3>
            <?php if (!$data['Cart']) : ?>
                <h1 style="font-size: 1.6rem; text-align: center;">Không có sản phẩm trong giỏ hàng</h1>
            <?php else : ?>
                <?php foreach ($data['Cart'] as $item) : ?>
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
                <div class="stepper-item active">
                    <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                    <div class="step-name">Đặt hàng</div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter"><i class="fa-solid fa-check"></i></div>
                    <div class="step-name">Thanh toán</div>
                </div>
            </div>
            <div>
                <div class="infoUser cart-right-form">
                    <p>1</p>
                    <p>Thông tin người mua</p>
                </div>
                <div>
                    <div class="gender">
                        <div style="margin-right: 10px;">
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Anh</label><br>
                        </div>
                        <div>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Chị</label><br>
                        </div>
                    </div>
                    <div class="input-info row">
                        <div class="col-sm-6"><input type="text" placeholder="Họ tên(Bắt buộc)"></div>
                        <div class="col-sm-6"><input type="text" placeholder="SĐT (bắt buộc)"></div>
                        <div class="col-sm-6"><input type="text" placeholder="Email"></div>
                        <div class="col-sm-6"><input type="date" placeholder="Ngày sinh"></div>
                    </div>
                    <div class="continue">
                        <button class="continue">Tiếp tục</button>
                    </div>
                </div>
                <div class="form-of-receipt cart-right-form">
                    <p>2</p>
                    <p>Hình thức nhận hàng</p>
                </div>
                <div>
                    <div class="input-info row">
                        <div class="col-sm-6">
                            <select name="province" id="province">
                                <option value="" selected>Chọn Tỉnh/Thành phố</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="city" id="city">
                                <option value="" selected>Chọn Quận/Huyện</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="wards" id="wards">
                                <option value="" selected>Chọn Phường/Xã</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="road" placeholder="Số nhà, Tên đường">
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="location_description" placeholder="Ghi chú">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Phương thức vận chuyển</p>
                    <div class="shippingMethod">
                        <label for="">
                            <input type="radio" name="" id="">
                        </label>
                        <div>
                            <p>Miễn phí vận chuyển</p>
                            <p>Dự kiến nhận hàng: Chủ nhật, ngày 25/02/2024 - Chủ nhật, ngày 03/03/2024</p>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="checkbox-list">
                        <li>
                            <input type="checkbox" id="checkbox1" name="checkbox1">
                            <label for="checkbox1">Đồng ý nhận các thông tin và chương trình khuyến mãi của PNJ qua email, SMS , mạng xã hội…</label>
                        </li>
                        <li>
                            <input type="checkbox" id="checkbox2" name="checkbox2">
                            <label for="checkbox2">Tôi đồng ý cho PNJ thu thập, xử lý dữ liệu cá nhân của tôi theo quy định tại Thông báo này và theo quy định của pháp luật.</label>
                        </li>
                    </ul>
                </div>
                <div style="text-align: center;">
                    <button>Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>