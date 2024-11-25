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

    public function productsList()
    {
        $listDanhMuc = $this->modelProducts->getAllCategories();
        $listProducts = $this->modelProducts->getAllProducts();
        $categories = $this->modelProducts->getAllCategories();
        $products = [];

        $categories = $this->modelProducts->getAllCategories();

        // Nếu không có id trong URL, mặc định lấy danh mục id = 1
        $categoryId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        // Lấy tối đa 5 sản phẩm theo danh mục
        $products = $this->modelProducts->getProductsByCategory($categoryId);
       

        require_once './views/product/products.php'; // Hiển thị danh sách sản phẩm
    }

    // public function listDanhMuc()
    // {
    //     $categories  = $this->modelProducts->getAllDanhMuc();
    //     require_once './views/admin.php';
    // }
    

}