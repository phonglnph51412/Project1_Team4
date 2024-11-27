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
                    <tbody id="gio_hang">
                        <?php $tong = 0; ?>
                        <?php foreach ($_SESSION['gio_hang'] as $key => $item): ?>
                            <?php $thanh_tien = $item['price'] * $item['so_luong']; ?>
                            <?php $tong += $thanh_tien; ?>
                            <tr>
                                <td>
                                    <img style="width: 50px;" src="<?= $item['hinh_anh']; ?>">
                                    <span><?= $item['name']; ?></span>
                                </td>
                                <td><?= number_format($item['price'], 0, '.', '.'); ?></td>
                                <td>
                                    <input type="number" class="form-control soluong" value="<?= $item['so_luong']; ?>" min="1" max="10">
                                    <input type="hidden" value="<?= $key; ?>">
                                </td>
                                <td><?= number_format($thanh_tien, 0, '.', '.'); ?></td>
                                <td>
                                    <a href="./?act=del-product&del-key=<?= $key; ?>">
                                        <button class="remove-item">Remove</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
                <?php if ($_SESSION['gio_hang'] !== []) { ?>
                    <button class="remove-item" style="margin-top:20px; height:30px">
                        <a style="text-decoration: none;
                    color:white;"
                            href="./?act=emty-cart&del-cart=1">Remove All</a></button>
                <?php } else { ?>
                    <br>
                    <h2>Emty Cart!</h2> <?php }  ?>
            </div>

            <!-- Tổng giỏ hàng -->
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>0 VND</span>
                </div>
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="summary-item total">
                    <span>Total</span>
                    <span><?= number_format($tong, 0, '.', '.') ?> VNĐ</span>
                </div>
                <!-- Các tùy chọn -->
                <div class="cart-actions">
                    <!-- <button class="continue-shopping">Continue Shopping</button> -->
                    <a href="./?act=view-products" class="checkout-btn">Continue Shopping</a>
                    <a href="./?act=pay" class="checkout-btn">Proceed to Checkout</a>
                </div>
            </div>

        </div>
    </main>

    <?php require_once './views/layout/footer.php' ?>
    <script>
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function(event) {
                if (!confirm("Are you sure you want to remove this item?")) {
                    event.preventDefault(); // Ngăn chặn hành động xoá nếu chọn "Cancel"
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#gio_hang").on("change", ".soluong", function() {
                var sl = $(this).val();
                var key = $(this).next().val();
                var row = $(this).closest("tr");

                $.post("./?act=update-cart", {
                    so_luong: sl,
                    key: key
                }, function(response) {
                    console.log("Response:", response); // Debug response
                    try {
                        var data = JSON.parse(response);

                        if (data.success) {
                            row.find("td:nth-child(4)").text(data.thanh_tien);
                            $(".cart-summary .total span:last-child").text(data.tong);
                        } else {
                            alert(data.message || "Error updating cart");
                        }
                    } catch (e) {
                        console.error("Parsing Error:", e);
                        alert("Invalid server response.");
                    }
                }).fail(function(xhr, status, error) {
                    console.error("AJAX Error: ", xhr.responseText);
                    alert("Failed to update cart. Please try again.");
                });
            });
        });
    </script>
</body>

</html>