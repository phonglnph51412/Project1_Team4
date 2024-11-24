<?php

class ProductsController
{
    public $modelProducts;

    public function __construct()
    {
        $this->modelProducts = new Products(); // Khởi tạo mô hình Products
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    public function index()
    {
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        $listProducts = $this->modelProducts->getAllProducts(); // Lấy danh sách sản phẩm
        // $listDonHang = $this->modelProducts->getAllDonHang();
        $listBinhLuan = $this->modelProducts->getAllBinhLuan();
        $listNguoiDung = $this->modelProducts->getAllNguoiDung();
        require_once './views/index.php'; // Hiển thị danh sách sản phẩm
    }

    public function listDanhMuc()
    {
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        require_once './views/admin.php';
    }

}