<?php

class TrangThaiController
{
    //kết nối đến fite model
    public $modelTrangThai;

    public function __construct()
    {
        $this->modelTrangThai = new TrangThai();
    }
    //hàm hiển thị form thêm
    public function index_trang_thai(){
        
        //lấy ra dữ liệu danh mục
        $trangThais = $this->modelTrangThai->getAll();
     //   var_dump($trangThais);

        //đưa dữ liệu ra view
        require_once './views/trangthai/list_trang_thai.php';
    }

    //hàm hiển thị form thêm
    public function create_trang_thai(){
        // require_once './views/trangthai/create_trang_thai.php';

    }

     //hàm sử lý thêm vào CSDL
     public function store_trang_thai(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu
            $ten_trang_thai = $_POST['ten_trang_thai'];
            $trang_thai_tb = $_POST['trang_thai_tb'];

            //validate
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'tên trang thai là bắt buộc';

            }

            if (empty($trang_thai_tb)) {
                $errors['trang_thai_tb'] = 'trạng thái là bắt buộc';
                
        }

        //thêm dữ liệu
        if (empty($errors)) {
            //nếu ko có lỗi thì thêm dữ liệu
            //thêm vào csdl
            $this->modelTrangThai->postData($ten_trang_thai,$trang_thai_tb);
            unset($_SESSION['errors']);
            header('location: ?act=trang-thais');
            exit();
        }else{
            $_SESSION['errors'] = $errors;
            header('location: ?act=form- them-trang-thai');
            exit();

        }
     }
    }

      //hàm hiển thị form chỉnh sửa
    public function edit_trang_thai(){
        //lấy id
        $id = $_GET['trang_thai_id'];
        //lấy thông tin chi tiết của danh mục
        $trangThai = $this->modelTrangThai->getDetailData($id);

       //đổ dữ liệu ra form
       require_once './views/trangthai/edit_trang_thai.php';

    }

     //hàm sử lý cập nhật dữ liệu vào CSDL
     public function update_trang_thai(){
       
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //lấy ra dữ liệu
                $id = $_POST['id'];
                $ten_trang_thai = $_POST['ten_trang_thai'];
                $trang_thai_tb = $_POST['trang_thai_tb'];
    
                //validate
                $errors = [];
                if (empty($ten_trang_thai)) {
                    $errors['ten_trang_thai'] = 'tên trạng thhasi là bắt buộc';
    
                }
    
                if (empty($trang_thai_tb)) {
                    $errors['trang_thai_tb'] = 'trạng thái là bắt buộc';
                    
            }
    
            //thêm dữ liệu
            if (empty($errors)) {
                //nếu ko có lỗi thì thêm dữ liệu
                //thêm vào csdl
                $this->modelTrangThai->updateData($id,$ten_trang_thai,$trang_thai_tb);
                unset($_SESSION['errors']);
                header('location: ?act=trang-thais');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-trang-thai');
                exit();
    
            }
         }
        
    
        
     }

      //hàm xóa dữ liệu trong CSDL
    public function destroy_trang_thai(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['trang_thai_id'];
            
            //xóa danh mục
           $deleteTrangThai = $this->modelTrangThai->deleteData($id);

           header('location: ?act=trang-thais');
           exit();
        }

    }
  
}