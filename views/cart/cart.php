<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Shoe Store</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/cart.css?v=<?= time(); ?>">
</head>

<body>
    <!-- Header của trang, bao gồm logo, menu, vv -->
    <?php require_once './views/layout/header.php' ?>

    <main class="container">
        <h1>Your Shopping Cart</h1>

        <!-- Giỏ hàng -->
        <div class="cart">
            <div class="cart-items">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sản phẩm 1 -->
                        <tr>
                            <td>
                                <img src="https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/f710005f-9512-4714-a1d8-4622bbbf082b/KD17+NRG.png" alt="Product Name" class="product-image">
                                <span>Giày Thể Thao Nike</span>
                            </td>
                            <td>500,000 VND</td>
                            <td>
                                <input type="number" value="1" min="1" class="quantity-input">
                            </td>
                            <td>500,000 VND</td>
                            <td>
                                <button class="remove-item">Remove</button>
                            </td>
                        </tr>
                        <!-- Sản phẩm 2 -->
                        <tr>
                            <td>
                                <img src="https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/9b5968aa-98ca-4109-8620-bcf53cd206cd/LEBRON+XXII.png" alt="Product Name" class="product-image">
                                <span>Giày Converse</span>
                            </td>
                            <td>600,000 VND</td>
                            <td>
                                <input type="number" value="2" min="1" class="quantity-input">
                            </td>
                            <td>1,200,000 VND</td>
                            <td>
                                <button class="remove-item">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tổng giỏ hàng -->
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>1,700,000 VND</span>
                </div>
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="summary-item total">
                    <span>Total</span>
                    <span>1,700,000 VND</span>
                </div>

                <!-- Các tùy chọn -->
                <div class="cart-actions">
                    <button class="continue-shopping">Continue Shopping</button>
                    <a href="./?act=pay" class="checkout-btn">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </main>

    <?php require_once './views/layout/footer.php' ?>

</body>

</html>