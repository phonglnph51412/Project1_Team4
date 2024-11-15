<?php 

class GV
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllGV() {
        // echo 'Ok!';
        $sql = 'SELECT * FROM tbl_giangvien';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addGV($maGiangVien, $hoTen, $namSinh, $soDienThoai, $gioiTinh) {
        echo 'Ok!';
        $sql = 'INSERT INTO tbl_giangvien (maGiangVien, hoTen, namSinh, soDienThoai, gioiTinh)
                VALUES (:maGiangVien, :hoTen, :namSinh, :soDienThoai, :gioiTinh)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':maGiangVien' => $maGiangVien, 
            ':hoTen' => $hoTen,
            ':namSinh'  => $namSinh,
            ':soDienThoai'  => $soDienThoai,
            ':gioiTinh' => $gioiTinh,
        ]);
        return true;
    }

    public function getThongTinGV($id) {
        echo 'Ok!';
        $sql = 'SELECT * FROM tbl_giangvien WHERE id='.$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateGV($id, $maGiangVien, $hoTen, $namSinh, $soDienThoai, $gioiTinh) {
        echo 'Ok!';
        $sql = 'UPDATE tbl_giangvien SET maGiangVien=:maGiangVien, hoTen=:hoTen, namSinh=:namSinh, soDienThoai=:soDienThoai, gioiTinh=:gioiTinh WHERE id='. $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':maGiangVien' => $maGiangVien, 
            ':hoTen' => $hoTen,
            ':namSinh'  => $namSinh,
            ':soDienThoai'  => $soDienThoai,
            ':gioiTinh' => $gioiTinh,
        ]);
        return true;
    }

    public function deleteGV($id) {
        echo 'Ok!';
        $sql = 'DELETE FROM tbl_giangvien WHERE id='.$id;
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
}