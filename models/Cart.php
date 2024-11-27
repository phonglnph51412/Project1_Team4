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
     public function addProductToCart($gioHangId, $sanPhamId, $soLuong) {
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
}


?>