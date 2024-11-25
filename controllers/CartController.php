<?php
require_once './models/Cart.php';
require_once './models/Products.php';

class CartController 
{
    public function viewCart()
    {
        require_once './views/cart/cart.php';
    }
    public function viewPay()
    {
        require_once './views/cart/pay.php';
    }
    public function addToCart()
    {
        // Kiểm tra nếu có thông tin sản phẩm và màu sắc, kích thước được chọn
        if (isset($_POST['product_id'], $_POST['color'], $_POST['size'], $_POST['quantity'])) {
            $product_id = $_POST['product_id'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $quantity = $_POST['quantity'];

            // Kiểm tra người dùng đã đăng nhập chưa
            if (!isset($_SESSION['user_id'])) {
                header("Location: /login"); // Chuyển đến trang đăng nhập nếu chưa đăng nhập
                exit;
            }

            $user_id = $_SESSION['user_id'];

            // Tạo giỏ hàng nếu chưa có
            $cart = new Cart();
            $cart->addProductToCart($user_id, $product_id, $color, $size, $quantity);

            echo "Product added to cart!";
        }
    }

    public function buyNow()
    {
        // Chuyển đến trang thanh toán
        if (isset($_GET['product_id'], $_GET['color'], $_GET['size'])) {
            $product_id = $_GET['product_id'];
            $color = $_GET['color'];
            $size = $_GET['size'];

            // Kiểm tra người dùng đã đăng nhập chưa
            if (!isset($_SESSION['user_id'])) {
                header("Location: /login");
                exit;
            }

            // Tạo giỏ hàng và lưu thông tin thanh toán
            header("Location: /checkout?product_id=$product_id&color=$color&size=$size");
            exit;
        }
    }
}
