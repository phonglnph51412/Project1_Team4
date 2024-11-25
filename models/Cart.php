<?php
class Cart
{
    // Thêm sản phẩm vào giỏ hàng
    public function addProductToCart($user_id, $product_id, $color, $size, $quantity)
    {
        global $pdo; // Kết nối đến database thông qua PDO

        // Kiểm tra nếu giỏ hàng của người dùng đã tồn tại
        $stmt = $pdo->prepare("SELECT id FROM gio_hangs WHERE nguoi_dung_id = ?");
        $stmt->execute([$user_id]);
        $cart = $stmt->fetch();

        if (!$cart) {
            // Tạo giỏ hàng mới nếu chưa có
            $stmt = $pdo->prepare("INSERT INTO gio_hangs (nguoi_dung_id) VALUES (?)");
            $stmt->execute([$user_id]);
            $cart_id = $pdo->lastInsertId();
        } else {
            $cart_id = $cart['id'];
        }

        // Thêm sản phẩm vào giỏ hàng
        $stmt = $pdo->prepare("INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong, mau, kich_thuoc) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$cart_id, $product_id, $quantity, $color, $size]);
    }
}
