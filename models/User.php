<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = connectDB();
    }

    // Kiểm tra thông tin đăng nhập
    public function getUser()
    {
        $query = "SELECT * FROM tai_khoans WHERE trang_thai = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    }
}
