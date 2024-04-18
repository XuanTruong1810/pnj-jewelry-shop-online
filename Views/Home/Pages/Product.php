<?php

if (!$data['Products']) : ?>
    <p style="text-align: center;color:red; font-weight: 500; font-size: 1.6rem; ">Không có sản phẩm nào</p>
<?php else : ?>

    <div class="product row">
        <?php
        foreach ($data['Products'] as $product) :
        ?>
            <div class="item col-sm-3">
                <div class="img">
                    <a href="../../Detail/ProductId/<?php echo $product['PRODUCTID']; ?>">
                        <img src="../../Public/Image/Products/jhhasodjc.png" alt="">
                    </a>
                </div>
                <div>
                    <div>
                        <a href="#"><?php echo $product['PRODUCTNAME']; ?></a>
                    </div>
                    <div>
                        <p class="price"><?php echo number_format($product['PRICE']) . ' ' . "VNĐ"; ?></p>
                    </div>
                </div>
                <div class="pay">
                    <p>48 đã bán</p>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        <div class="pagination-container">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php
                    for ($i = 0; $i < $data['Pagination']; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="?pagination=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>