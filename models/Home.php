<?php

    class SamPham {
        public $conn;

        public function __construct()
        {
            $this -> conn = connectDB();
        }

        public function getAllSanPham($id){
            try {
                $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.danh_muc_id = :id';

                $stmt = $this ->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt -> execute();

                return $stmt-> fetchAll();
            } catch (Exception $e) {
                echo "loi" . $e->getMessage();
            }
        }

        public function listDanhMuc() {
        try{
            $sql = 'SELECT * FROM danh_mucs';

            $stmt = $this ->conn->prepare($sql);
                $stmt -> execute();

                return $stmt-> fetchAll();
            } catch (Exception $e) {
                echo "loi" . $e->getMessage();
            }
        }
    }



?>