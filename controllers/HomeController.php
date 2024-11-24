<?php

class HomeController {
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SamPham();
    }

    public function home(){
        $id = $_GET['id_danh_muc'];
        // var_dump($id);die;
        $listSanPham = $this->modelSanPham->getAllSanPham($id);
        // var_dump($listSanPham);die;
        $danhmuc = $this->modelSanPham->listDanhMuc();
        // var_dump($danhmuc);die;
        require_once './views/product/products.php';
    }
    public function listSpTheoDM(){
       
    }

}





?>

