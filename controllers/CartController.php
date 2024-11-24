<?php

class CartController
{
    public $modelCart;

    public function __construct()
    {
        $this->modelCart = new Cart();
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    // Hiển thị trang cart


    public function viewPay()
    {
        require_once './views/cart/pay.php';
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $product = $this->modelCart->getProductById($product_id);

            if ($product) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }

                $found = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] == $product_id) {
                        $item['quantity'] += $quantity;
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $cartItem = array(
                        'id' => $product_id,
                        'name' => $product['ten'],
                        'price' => $product['gia'],
                        'quantity' => $quantity
                    );
                    array_push($_SESSION['cart'], $cartItem);
                }


                header('Location: ./');
                exit;
            }
        }
    }


    // Hiển thị giỏ hàng
    public function viewCart()
    {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            require_once './views/gioHangTrong.php';
        } else {
            $cartItems = $_SESSION['cart'];
            require_once './views/gioHang.php';
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];

            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }

            header('Location: ./?act=viewCart');
            exit;
        }
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        unset($_SESSION['cart']);
        header('Location: ./');
        exit;
    }
}





?>