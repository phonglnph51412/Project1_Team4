<?php

class HomeController
{
    public $modelHome;

    public function __construct()
    {
        $this->modelHome = new Home(); // Khởi tạo mô hình Home
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    public function home()
    {
        $listDanhMuc = $this->modelHome->getAllCategories();
        $listProducts = $this->modelHome->getAllProducts();
        $categories = $this->modelHome->getAllCategories();
        $products = [];

        $categories = $this->modelHome->getAllCategories();

        // Nếu không có id trong URL, mặc định lấy danh mục id = 1
        $categoryId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        // Lấy tối đa 5 sản phẩm theo danh mục
        $products = $this->modelHome->getProductsByCategory($categoryId, 5);
        require_once './views/home/home.php'; 
    }

    public function listDanhMuc()
    {
        $listDanhMuc = $this->modelHome->getAllCategories();
        require_once './views/admin.php';
    }
}
