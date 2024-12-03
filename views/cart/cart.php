<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Shoe Store</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/cart.css?v=<?= time(); ?>">
</head>

<body>
    <!-- Header -->
    <?php require_once './views/layout/header.php'; ?>

    <main class="container">
        <h1>Your Shopping Cart</h1>

        <div class="cart">
            <div class="cart-items">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="gio_hang">
                        <?php
                        $tong = 0;
                        // var_dump($cartItems);
                        if (!empty($cartItems)) {
                            foreach ($cartItems as $item):
                                $tong += $item['thanh_tien'];
                        ?>
                                <tr>
                                    <td>
                                        <img src="<?= $item['hinh_anh']; ?>" alt="Product" style="width: 50px;">
                                        <span><?= $item['name']; ?></span>
                                    </td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td><?= number_format($item['price'], 0, '.', '.'); ?></td>
                                    <td>
                                        <!-- Form để tự động gửi số lượng khi thay đổi -->
                                        <form action="./?act=updateCart" method="POST" class="update-cart-form">
                                            <input type="hidden" name="cart_item_id" value="<?= $item['cart_item_id']; ?>" />
                                            <input type="number" name="quantity" value="<?= $item['so_luong']; ?>" min="1" max="10" onchange="this.form.submit()" />

                                        </form>
                                    </td>
                                    <td class="total-price"><?= number_format($item['thanh_tien'], 0, '.', '.'); ?> VNĐ</td>
                                    <td>
                                        <!-- Nút Xóa -->
                                        <a href="index.php?act=deleteProduct&cartItemId=<?= $item['cart_item_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } else { ?>
                            <tr>
                                <td colspan="5">Your cart is empty.</td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

                <!-- Cart Summary -->
                <div class="cart-summary1">
                    <h2>Cart Summary</h2>
                    <div class="cart-summary">
                        <span>Subtotal</span>
                        <span><?= number_format($tong, 0, '.', '.'); ?> VNĐ</span>
                    </div>
                    <div class="summary-item">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="total span">
                        <span>Total</span>
                        <span><?= number_format($tong, 0, '.', '.'); ?> VNĐ</span>
                    </div>
                    <div class="cart-actions">
                        <a href="./?act=view-products" class="checkout-btn">Continue Shopping</a>
                        <a href="./?act=pay" class="checkout-btn">Proceed to Checkout</a>
                    </div>
                </div>

                <?php if (!empty($cartItems)) { ?>
                    <button class="remove-item" style="margin-top:20px; height:30px">
                        <a style="text-decoration: none; color:white;" href="./?act=emty-cart&del-cart=1">Remove All</a>
                    </button>
                <?php } ?>
            </div>
        </div>
    </main>

    <?php require_once './views/layout/footer.php'; ?>


</body>
<script>
    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('input', function() {
            if (this.value > 10) {
                alert('Số lượng không được vượt quá 10!');
                this.value = 10;
            }
        });
    });
</script>



</html>