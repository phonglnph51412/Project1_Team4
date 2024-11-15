<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cập nhật thông tin giảng viên <?php echo $gv['id'] ?></h1>
    <form action="./?act=post-update-gv" method="post">
        <input type="hidden" name="id" id="" value="<?php echo $gv['id']; ?>">
        <label for="maGiangVien">Mã giảng viên</label>
        <input type="text" name="maGiangVien" id="" value="<?php echo $gv['maGiangVien']; ?>"><br>

        <label for="hoTen">Họ tên</label>
        <input type="text" name="hoTen" id="" value="<?php echo $gv['hoTen']; ?>"><br>

        <label for="namSinh">Năm sinh</label>
        <input type="text" name="namSinh" id="" value="<?php echo $gv['namSinh']; ?>"><br>

        <label for="soDienThoai">Phone</label>
        <input type="text" name="soDienThoai" id="" value="<?php echo $gv['soDienThoai']; ?>"><br>

        <label for="gioiTinh">Giới tính</label>
        <input type="number" name="gioiTinh" id="" value="<?php echo $gv['gioiTinh']; ?>"><br>
        <button>Cập nhật</button>
    </form>
</body>
</html>