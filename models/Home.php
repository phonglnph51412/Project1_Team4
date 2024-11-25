<?php

class Home
{
    private $db;

    public function __construct()
    {
        $this->db = connectDB(); // Khởi tạo đối tượng kết nối cơ sở dữ liệu
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts()
    {
        $query = "SELECT * FROM san_phams";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id)
    {
        $query = "SELECT * FROM san_phams WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết sản phẩm (màu sắc, kích thước, số lượng)
    public function getProductDetails($productId)
    {
        $query = "
            SELECT DISTINCT
    ms.ten_mau,
    ms.ma_mau_hex,
    kt.so_size, 
    sct.so_luong
FROM 
    san_pham_chi_tiet sct
LEFT JOIN mau_sac ms ON sct.mau_sac_id = ms.id
LEFT JOIN kich_thuoc kt ON sct.kich_thuoc_id = kt.id
WHERE 
    sct.san_pham_id = ?
";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$productId]);
        return $stmt->fetchAll();
    }




    public function productDetail()
    
    {
        if (isset($_GET['id'])) {
            $productId = intval($_GET['id']); 
            $query = "SELECT * FROM san_phams WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$productId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
            echo "<p>Invalid product ID.</p>";
        }
    }
    // Lấy ra danh mục sản phẩm
    public function getAllCategories()
    {
        $query = "SELECT id, ten_danh_muc FROM danh_mucs";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Lấy danh sách sản phẩm theo danh mục và giới hạn số lượng
    public function getProductsByCategory($categoryId, $limit = 5)
    {
        // Ép kiểu $limit thành số nguyên để đảm bảo an toàn
        $limit = (int)$limit;

        // Sử dụng LIMIT trực tiếp trong câu truy vấn
        $query = "SELECT * FROM san_phams WHERE danh_muc_id = ? LIMIT $limit";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllNguoiDung()
    {
        $query = "SELECT * FROM nguoi_dung";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
