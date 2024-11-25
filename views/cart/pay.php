<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán - Shoe Store</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/pay.css?v=<?= time(); ?>">
</head>

<body>
    <?php require_once './views/layout/header.php' ?>

    <div class="container">
        <h1>Thanh Toán</h1>
        <form action="#" method="post" class="payment-form">

            <!-- Thông tin giao hàng -->
            <section class="shipping-info">
                <h2>Thông Tin Giao Hàng</h2>
                <div class="form-group">
                    <label for="full-name">Họ và tên</label>
                    <input type="text" id="full-name" name="full_name" placeholder="Nhập họ tên của bạn" required>
                </div>
                <div class="form-group">
                    <label for="phone-number">Số điện thoại</label>
                    <input type="tel" id="phone-number" name="phone_number" placeholder="Nhập số điện thoại của bạn" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ nhận hàng</label>
                    <input type="text" id="address" name="address" placeholder="Nhập địa chỉ giao hàng" required>
                </div>
                <div class="form-group">
                    <label for="city">Thành phố</label>
                    <input type="text" id="city" name="city" placeholder="Nhập thành phố của bạn" required>
                </div>
                <div class="form-group">
                    <label for="postal-code">Mã bưu điện</label>
                    <input type="text" id="postal-code" name="postal_code" placeholder="Nhập mã bưu điện" required>
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
                        <tr>
                            <td>Giày Thể Thao Nike</td>
                            <td>1,500,000 VND</td>
                            <td>2</td>
                            <td>3,000,000 VND</td>
                        </tr>
                        <tr>
                            <td>Giày Converse</td>
                            <td>1,200,000 VND</td>
                            <td>1</td>
                            <td>1,200,000 VND</td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="3">Tổng Cộng</td>
                            <td>4,200,000 VND</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Phương thức thanh toán -->
            <section class="payment-method">
                <h2>Chọn Phương Thức Thanh Toán</h2>
                <!-- <div class="payment-option">
                    <label for="payment-credit">Thẻ tín dụng</label>
                    <input type="radio" id="payment-credit" name="payment_method" value="credit_card" required>
                </div>
                <div class="payment-option">
                    <label for="payment-bank">Chuyển khoản ngân hàng</label>
                    <input type="radio" id="payment-bank" name="payment_method" value="bank_transfer" required>
                </div> -->
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

    <?php require_once './views/layout/footer.php' ?>
</body>

</html>