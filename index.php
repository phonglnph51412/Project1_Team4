<?php

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/CartController.php';
require_once './controllers/ProductsController.php';
require_once './controllers/UserController.php';


// Require toàn bộ file Models
require_once './models/Home.php';
require_once './models/Cart.php';
require_once './models/Products.php';
require_once './models/User.php';

// require_once './models/Products.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    // 'view-cart' => (new CartController())->viewCart(),
    // 'view-pay' => (new CartController())->viewPay(),
    'product-detail' => (new HomeController())->viewProductDetail(),
    'login' => (new UserController())->login(),
    'logout' => (new UserController())->logout(),
    'view-products' => (new ProductsController())->productsList(),
    'del-product' => (new CartController())-> handleRequest(),
    'emty-cart' => (new CartController())-> emtyCart(),
    'add-to-cart' => (new CartController())->addToCart(),
    'update-cart' => (new CartController())->updateCart(),
    'my-cart' => (new CartController)->viewCart(),
    'pay' => (new CartController)->viewPay(),
    'my-oder' => (new UserController())->myCart(),
    'process-paymen' => (new CartController)->viewPay(),

    'about-us' => (new HomeController())->aboutUs(),
    'contact' => (new HomeController())->contact(),



};
