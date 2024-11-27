<?php
class CartController
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new Cart(); // Khởi tạo mô hình Home
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    // Xem giỏ hàng
    public function viewCart()
    {
        // $gioHangId = isset($_SESSION['gioHangId']) ? $_SESSION['gioHangId'] : 1; // Lấy ID giỏ hàng từ session

        // // Lấy danh sách các sản phẩm trong giỏ hàng
        // $cartItems = $this->cartModel->getCartItems($gioHangId);

        // // Tính tổng giá trị giỏ hàng
        // $totalPrice = $this->cartModel->getTotalPrice($gioHangId);

        // Truyền dữ liệu sang view
        require_once './views/cart/cart.php';
    }

    

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {   
        
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận dữ liệu từ form
            $productId = $_POST['id'];
            $productName = $_POST['ten_san_pham'];
            $price = $_POST['gia_ban'];
            $hinh_anh = $_POST['hinh_anh'];
            if(isset($_POST['so_luong'])&& $_POST['so_luong']>0){
                $so_luong = $_POST['so_luong'];
            }else{
                $so_luong = 1;
            }
            
            // $color = $_POST['color'];
            // $size = $_POST['size'];
            // $quantity = $_POST['quantity'];
            // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không
            $check = false;
            foreach ($_SESSION['gio_hang'] as $key => $value){
                if($value['id'] == $productId){
                    $check = true;
                    $_SESSION['gio_hang'][$key]['so_luong']+=$so_luong;
                }
            }
            if(!$check){
            $item = array('id' => $productId, 'name' => $productName,'price' => $price, 'hinh_anh' => $hinh_anh, 'so_luong' => $so_luong);

            array_push($_SESSION['gio_hang'], $item);
            // var_dump($_SESSION['gio_hang']);die;

            
            }
            header('Location: ./?act=my-cart');

        }
    }
    // Xoá sản phẩm khỏi giỏ hàng
    public function removeFromCart()
    {
        if (isset($_GET['del-key'])) {
            $delKey = $_GET['del-key'];
            // var_dump($delKey); die();

            // Kiểm tra và xoá sản phẩm trong giỏ hàng
            if (isset($_SESSION['gio_hang'][$delKey])) {
                unset($_SESSION['gio_hang'][$delKey]);
                echo "Item removed successfully."; 
            }else{
                echo "Item not found.";
            }

            // Chuyển hướng về trang giỏ hàng sau khi xoá sản phẩm
            header("Location: ./?act=my-cart");
            exit();
        }
    }
    public function handleRequest() {
    // Kiểm tra nếu có yêu cầu xoá sản phẩm
    if (isset($_GET['act']) && $_GET['act'] == 'del-product') {
        // Nếu có tham số del-key, gọi phương thức xoá sản phẩm
        if (isset($_GET['del-key'])) {
            $this->removeFromCart();
        } else {
            $this->viewCart();
        }
    }

    // Kiểm tra nếu có yêu cầu thêm sản phẩm vào giỏ
    if (isset($_GET['act']) && $_GET['act'] == 'add-to-cart') {
        $this->addToCart();
  
    }
}
   
public function emtyCart(){
        if (isset($_GET['act']) && $_GET['act'] == 'emty-cart') {
            // Nếu có tham số del-key, gọi phương thức xoá sản phẩm
            if (isset($_GET['del-cart'])&& ($_GET['del-cart'])==1) {
                $_SESSION['gio_hang'] = [];
                header("Location: ./?act=my-cart");
            } 
}

    
}

public function updateCart(){
        // session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            error_log(print_r($_POST, true)); // Ghi lại POST data
            $key = isset($_POST['key']) && is_numeric($_POST['key']) ? (int)$_POST['key'] : null;
            $so_luong = isset($_POST['so_luong']) && is_numeric($_POST['so_luong']) && $_POST['so_luong'] > 0 ? (int)$_POST['so_luong'] : 1;

            if ($key !== null && isset($_SESSION['gio_hang'][$key])) {
                // Cập nhật số lượng sản phẩm
                $_SESSION['gio_hang'][$key]['so_luong'] = $so_luong;

                // Tính lại tổng giá trị giỏ hàng
                $tong = 0;
                foreach ($_SESSION['gio_hang'] as $item) {
                    $tong += $item['price'] * $item['so_luong'];
                }

                // Thành tiền cho sản phẩm đã thay đổi
                $thanh_tien = $_SESSION['gio_hang'][$key]['price'] * $so_luong;

                // Trả về kết quả JSON
                echo json_encode([
                    'debug' => $_POST,
                    'success' => true,
                    'thanh_tien' => number_format($thanh_tien, 0, '.', '.'),
                    'tong' => number_format($tong, 0, '.', '.')
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid product']);
            }

            exit;
        }
        

}

public function viewPay(){
    require_once './views/cart/pay.php';
}











}


?>