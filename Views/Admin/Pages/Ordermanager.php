<?php if (!$data['Orders']) : ?>
    <h1>Không tồn tại hóa đơn</h1>
<?php else : ?>
    <?php foreach ($data['Orders'] as $order) : ?>
        <a href="../../OrderDetail/OrderDetailID/<?php echo $order['ORDERID'] ?>"><?php echo $order['ORDERID'] ?></a>
    <?php endforeach; ?>
<?php endif ?>