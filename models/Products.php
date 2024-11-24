<?php

class Products
{
    private $db;

    public function __construct()
    {
        $this->db = connectDB(); // Khởi tạo đối tượng kết nối cơ sở dữ liệu
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts()
    {
        $query = "SELECT * FROM san_pham";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id)
    {
        $query = "SELECT * FROM san_pham WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Lấy ra danh mục sản phẩm
    public function getAllDanhMuc()
    {
        $query = "SELECT * FROM danh_muc_san_pham";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDanhMuc($id)
    {
        $query = "SELECT * FROM danh_muc_san_pham WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // public function getAllDonHang()
    // {
    //     $query = "SELECT * FROM don_hang";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    public function getAllBinhLuan()
    {
        $query = "SELECT * FROM gui_danh_gia";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllNguoiDung()
    {
        $query = "SELECT * FROM nguoi_dung";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
