<?php
class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = connectDB(); // Kết nối cơ sở dữ liệu
    }

    // Lấy các sản phẩm trong giỏ hàng
    public function getCartItems($gioHangId)
    {
        // Truy vấn lấy thông tin sản phẩm trong giỏ hàng
        $query = "
            SELECT sp.ten_san_pham, sp.gia_ban, ctg.so_luong, ctg.gia_mua, 
                   ctsp.mau_sac_id, ctsp.kich_thuoc_id, sp.id as product_id
            FROM chi_tiet_gio_hangs ctg
            JOIN san_pham_chi_tiet ctsp ON ctg.chi_tiet_san_pham_id = ctsp.id
            JOIN san_pham sp ON ctsp.san_pham_id = sp.id
            WHERE ctg.gio_hang_id = :gioHangId
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':gioHangId', $gioHangId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách các sản phẩm trong giỏ
    }

    // Tính tổng giá trị giỏ hàng
    public function getTotalPrice($gioHangId)
    {
        $query = "
            SELECT SUM(ctg.so_luong * ctg.gia_mua) AS total_price
            FROM chi_tiet_gio_hangs ctg
            WHERE ctg.gio_hang_id = :gioHangId
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':gioHangId', $gioHangId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_price'] ?? 0;
    }

    // user
    public function getUser()
    {
        $query = "SELECT * FROM tai_khoans WHERE trang_thai = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Thêm sản phẩm vào giỏ hàng
    public function addProductToCart($gioHangId, $sanPhamId, $soLuong)
    {
        // Kiểm tra xem sản phẩm đã có trong giỏ chưa
        $query = "SELECT id, so_luong FROM chi_tiet_gio_hangs WHERE gio_hang_id = ? AND san_pham_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$gioHangId, $sanPhamId]);
        $result = $stmt->fetch();

        if ($result) {
            // Nếu sản phẩm đã có, cập nhật số lượng
            $query = "UPDATE chi_tiet_gio_hangs SET so_luong = so_luong + ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$soLuong, $result['id']]);
        } else {
            // Nếu chưa có, thêm mới
            $query = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong, gia_mua) 
                      VALUES (?, ?, ?, (SELECT gia_ban FROM san_phams WHERE id = ?))";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$gioHangId, $sanPhamId, $soLuong, $sanPhamId]);
        }
    }

    public function pay($gioHangId, $paymentMethod)
    {
        try {
            // Bắt đầu giao dịch
            $this->db->beginTransaction();

            // Kiểm tra người dùng đã đăng nhập
            if (!isset($_SESSION['user_id'])) {
                header('Location: ./login.php'); // Chuyển hướng nếu chưa đăng nhập
                exit();
            }
            $user_id = $_SESSION['user_id'];

            // Lấy thông tin người dùng
            $sql_user = "SELECT ho_ten, so_dien_thoai, dia_chi FROM tai_khoans WHERE id = ?";
            $stmt_user = $this->db->prepare($sql_user);
            $stmt_user->execute([$user_id]);
            $user_info = $stmt_user->fetch(PDO::FETCH_ASSOC);

            if (!$user_info) {
                throw new Exception('Người dùng không tồn tại.');
            }

            // Lấy thông tin giỏ hàng
            $sql_cart = "
            SELECT ctgh.chi_tiet_san_pham_id, sp.ten_san_pham, sp.gia_ban, ctgh.so_luong, 
                   (sp.gia_ban * ctgh.so_luong) AS thanh_tien
            FROM chi_tiet_gio_hangs ctgh
            JOIN san_pham_chi_tiet ctsp ON ctgh.chi_tiet_san_pham_id = ctsp.id
            JOIN san_pham sp ON ctsp.san_pham_id = sp.id
            WHERE ctgh.gio_hang_id = ?
        ";
            $stmt_cart = $this->db->prepare($sql_cart);
            $stmt_cart->execute([$gioHangId]);
            $cart_items = $stmt_cart->fetchAll(PDO::FETCH_ASSOC);

            if (empty($cart_items)) {
                throw new Exception('Giỏ hàng trống.');
            }

            // Tính tổng giá trị giỏ hàng
            $total_amount = array_sum(array_column($cart_items, 'thanh_tien'));

            // Tạo đơn hàng mới
            $sql_order = "
            INSERT INTO don_hangs (nguoi_dung_id, tong_tien, phuong_thuc_thanh_toan, ngay_tao) 
            VALUES (?, ?, ?, NOW())
        ";
            $stmt_order = $this->db->prepare($sql_order);
            $stmt_order->execute([$user_id, $total_amount, $paymentMethod]);
            $order_id = $this->db->lastInsertId();

            // Thêm chi tiết đơn hàng
            $sql_order_details = "
            INSERT INTO chi_tiet_don_hangs (don_hang_id, chi_tiet_san_pham_id, so_luong, gia_ban) 
            VALUES (?, ?, ?, ?)
        ";
            $stmt_order_details = $this->db->prepare($sql_order_details);

            foreach ($cart_items as $item) {
                $stmt_order_details->execute([
                    $order_id,
                    $item['chi_tiet_san_pham_id'],
                    $item['so_luong'],
                    $item['gia_ban']
                ]);
            }

            // Xóa giỏ hàng sau khi thanh toán
            $sql_clear_cart = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = ?";
            $stmt_clear_cart = $this->db->prepare($sql_clear_cart);
            $stmt_clear_cart->execute([$gioHangId]);

            // Commit giao dịch
            $this->db->commit();

            // Trả thông tin thanh toán cho giao diện
            return [
                'status' => 'success',
                'order_id' => $order_id,
                'user_info' => $user_info,
                'total_amount' => $total_amount,
                'cart_items' => $cart_items,
            ];
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->db->rollBack();
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function getCartByUserId($user_id)
    {
        $sql = "
        SELECT sp.ten_san_pham, sp.gia_ban, ctgh.so_luong, (sp.gia_ban * ctgh.so_luong) AS thanh_tien
        FROM chi_tiet_gio_hangs ctgh
        JOIN san_phams sp ON ctgh.san_pham_id = sp.id
        WHERE ctgh.gio_hang_id = (SELECT id FROM gio_hangs WHERE nguoi_dung_id = ?)
    ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);

        // Lấy tất cả kết quả dưới dạng mảng
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function clearCart($userId)
    {
        $query = "
        DELETE FROM chi_tiet_gio_hangs
        WHERE gio_hang_id = (SELECT id FROM gio_hangs WHERE nguoi_dung_id = :userId)
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    public function createOrderDetail($orderId, $productName, $productPrice, $quantity, $subTotal)
    {
        $query = "
        INSERT INTO chi_tiet_don_hangs (don_hang_id, ten_san_pham, gia_ban, so_luong, thanh_tien)
        VALUES (:orderId, :productName, :productPrice, :quantity, :subTotal)
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':subTotal', $subTotal);

        $stmt->execute();
    }

    public function createOrder($userId, $fullName, $phoneNumber, $address, $totalAmount, $paymentMethod)
    {
        $query = "
        INSERT INTO don_hangs (nguoi_dung_id, ho_ten, so_dien_thoai, dia_chi, tong_tien, phuong_thuc_thanh_toan, ngay_tao)
        VALUES (:userId, :fullName, :phoneNumber, :address, :totalAmount, :paymentMethod, NOW())
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':totalAmount', $totalAmount);
        $stmt->bindParam(':paymentMethod', $paymentMethod);

        $stmt->execute();

        // Trả về ID của đơn hàng vừa tạo
        return $this->db->lastInsertId();
    }




}
