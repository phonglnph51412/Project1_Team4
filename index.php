<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/GVController.php';

// Require toàn bộ file Models
require_once './models/GV.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new GVController())->danhSachGV(),
    'form-add-gv' => (new GVController())->formAddGV(),
    'post-add-gv' => (new GVController())->postAddGV(),
    'form-update-gv' => (new GVController())->formUpdateGV(),
    'post-update-gv' => (new GVController())->postUpdateGV(),
    'delete-gv' => (new GVController())->deleteGV(),
    
};