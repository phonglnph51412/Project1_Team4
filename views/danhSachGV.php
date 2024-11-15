<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách giảng viên</h1>
    <a href="./?act=form-add-gv"><button>Thêm</button></a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Mã giảng viên</th>
            <th>Họ tên</th>
            <th>Năm sinh</th>
            <th>Phone</th>
            <th>Giới tính</th>
            <th>Chức năng</th>
        </thead>
        <tbody>
            <?php foreach($listGV as $gv): ?>
            <tr>
                <td><?= $gv['id']; ?></td>
                <td><?= $gv['maGiangVien']; ?></td>
                <td><?= $gv['hoTen']; ?></td>
                <td><?= $gv['namSinh']; ?></td>
                <td><?= $gv['soDienThoai']; ?></td>
                <td><?= $gv['gioiTinh']; ?></td>
                <td>
                    <a href="./?act=form-update-gv&id=<?php echo $gv['id']; ?>"><button>Sửa</button></a>
                    <a href="./?act=delete-gv&id=<?php echo $gv['id']; ?>" onclick="return confirm('Xác nhận xóa')"><button>Xóa</button></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>
    
</body>
</html>