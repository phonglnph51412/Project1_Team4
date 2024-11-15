<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thêm giảng viên</h1>
    <form action="./?act=post-add-gv" method="post">
        <label for="maGiangVien">Mã giảng viên</label>
        <input type="text" name="maGiangVien" id=""><br>

        <label for="hoTen">Họ tên</label>
        <input type="text" name="hoTen" id=""><br>

        <label for="namSinh">Năm sinh</label>
        <input type="text" name="namSinh" id=""><br>

        <label for="soDienThoai">Phone</label>
        <input type="text" name="soDienThoai" id=""><br>

        <label for="gioiTinh">Giới tính</label>
        <input type="number" name="gioiTinh" id=""><br>
        <button>Thêm</button>
    </form>
</body>
</html>