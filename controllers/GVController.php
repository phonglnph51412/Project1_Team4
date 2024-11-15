<?php 

class GVController
{
    public $modelGV;

    public function __construct()
    {
        $this->modelGV = new GV();
    }

    public function danhSachGV() {
        // echo 'Ok!';
        $listGV = $this->modelGV->getAllGV();
        require_once './views/danhSachGV.php';
    }

    public function formAddGV() {
        // echo 'Ok!';
        require_once './views/formAddGV.php';
    }

    public function postAddGV() {
        // echo 'Ok!';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $maGiangVien = $_POST['maGiangVien'];
            $hoTen = $_POST['hoTen'];
            $namSinh = $_POST['namSinh'];
            $soDienThoai = $_POST['soDienThoai'];
            $gioiTinh = $_POST['gioiTinh'];

            if($this->modelGV->addGV($maGiangVien, $hoTen, $namSinh, $soDienThoai, $gioiTinh)){
                header('Location: ./');
            }
        }

    }

    public function formUpdateGV() {
        echo 'Ok!';
        $id = $_GET['id'];
        $gv = $this->modelGV->getThongTinGV($id);
        require_once './views/formUpdateGV.php'; 
    }

    public function postUpdateGV() {
        echo 'Ok!';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $maGiangVien = $_POST['maGiangVien'];
            $hoTen = $_POST['hoTen'];
            $namSinh = $_POST['namSinh'];
            $soDienThoai = $_POST['soDienThoai'];
            $gioiTinh = $_POST['gioiTinh'];

            if($this->modelGV->updateGV($id, $maGiangVien, $hoTen, $namSinh, $soDienThoai, $gioiTinh)){
                header('Location: ./');
            }
        }
    }

    public function deleteGV() {
        echo 'Ok!';
        $id = $_GET['id'];
        $banh = $this->modelGV->getThongTinGV($id);
        if($this->modelGV->deleteGV($id)){
            header('Location: ./');
        }
    }
    

}