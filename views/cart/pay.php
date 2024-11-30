<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán - Shoe Store</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/pay.css?v=<?= time(); ?>">
</head>

<body>
    <?php require_once './views/layout/header.php'; ?>

    <div class="container">
        <h1>Thanh Toán</h1>
        <form action="./?act=process-payment" method="post" class="payment-form">

            <!-- Thông tin giao hàng -->
            <section class="shipping-info">
                <h2>Thông Tin Giao Hàng</h2>
                <div class="form-group">
                    <label for="full-name">Họ và tên</label>
                    <input type="text" id="full-name" name="full_name" value="<?= htmlspecialchars($user_info['ho_ten']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone-number">Số điện thoại</label>
                    <input type="tel" id="phone-number" name="phone_number" value="<?= htmlspecialchars($user_info['so_dien_thoai']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ nhận hàng</label>
                    <input type="text" id="address" name="address" value="<?= htmlspecialchars($user_info['dia_chi']); ?>" required>
                </div>
            </section>

            <!-- Chi tiết đơn hàng -->
            <section class="order-details">
                <h2>Chi Tiết Đơn Hàng</h2>
                <table class="order-summary">
                    <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['ten_san_pham']); ?></td>
                                <td><?= number_format($item['gia_ban'], 0, ',', '.'); ?> VND</td>
                                <td><?= $item['so_luong']; ?></td>
                                <td><?= number_format($item['thanh_tien'], 0, ',', '.'); ?> VND</td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="total-row">
                            <td colspan="3">Tổng Cộng</td>
                            <td><?= number_format($total_amount, 0, ',', '.'); ?> VND</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Phương thức thanh toán -->
            <section class="payment-method">
                <h2>Chọn Phương Thức Thanh Toán</h2>
                <div class="payment-option">
                    <label for="payment-cash">Thanh toán khi nhận hàng</label>
                    <input type="radio" id="payment-cash" name="payment_method" value="cash_on_delivery" required>
                </div>
            </section>

            <!-- Xác nhận -->
            <section class="confirm-section">
                <button type="submit" class="btn-confirm">Xác Nhận Thanh Toán</button>
            </section>

        </form>
    </div>

    <?php require_once './views/layout/footer.php'; ?>
</body>

</html>