<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theo dõi đơn hàng</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once './views/layout/header.php'; ?>
    <h1>Theo dõi đơn hàng</h1>

    <?php if (empty($orders)): ?>
        <p>Bạn chưa có đơn hàng nào.</p>
    <?php else: ?>
        <?php foreach ($orders as $order_id => $order): ?>
            <div class="order">
                <h2>Đơn hàng #<?= $order_id; ?></h2>
                <p>Ngày đặt: <?= date('d/m/Y H:i', strtotime($order['created_at'])); ?></p>
                <p>Tổng tiền: <?= number_format($order['total_price'], 0, ',', '.'); ?> VND</p>
                <h3>Chi tiết sản phẩm:</h3>
                <ul>
                    <?php foreach ($order['details'] as $item): ?>
                        <li>
                            <?= $item['product_name']; ?> - SL: <?= $item['quantity']; ?>
                            - Giá: <?= number_format($item['price'], 0, ',', '.'); ?> VND
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php require_once './views/layout/footer.php'; ?>
</body>

</html>