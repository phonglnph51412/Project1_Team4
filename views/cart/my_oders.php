<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theo dõi đơn hàng</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/my_orders.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .status {
            font-weight: bold;
            color: green;
        }

        .status.pending {
            color: orange;
        }

        .status.cancelled {
            color: red;
        }
    </style>
</head>

<body>
    <?php require_once './views/layout/header.php'; ?>

    <h1>Theo dõi đơn hàng</h1>

    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Chi tiết sản phẩm</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <!-- Đơn hàng 1 -->
            <tr>
                <td>#12345</td>
                <td>15/11/2024 14:30</td>
                <td>1.500.000 VND</td>
                <td>
                    <ul style="list-style: none;">
                        <li>Giày thể thao Nike - SL: 1 - Giá: 1.000.000 VND</li>
                        <li>Vớ thể thao - SL: 2 - Giá: 250.000 VND</li>
                    </ul>
                </td>
                <td class="status delivered">Đã giao</td>
            </tr>

            <!-- Đơn hàng 2 -->
            <tr>
                <td>#12346</td>
                <td>16/11/2024 10:45</td>
                <td>2.800.000 VND</td>
                <td>
                    <ul style="list-style: none;">
                        <li>Giày Adidas UltraBoost - SL: 1 - Giá: 2.500.000 VND</li>
                        <li>Dây giày - SL: 1 - Giá: 300.000 VND</li>
                    </ul>
                </td>
                <td class="status pending">Đang xử lý</td>
            </tr>

            <!-- Đơn hàng 3 -->
            <tr>
                <td>#12347</td>
                <td>20/11/2024 08:20</td>
                <td>3.200.000 VND</td>
                <td>
                    <ul style="list-style: none;">
                        <li>Giày Puma - SL: 2 - Giá: 3.000.000 VND</li>
                        <li>Balo thể thao - SL: 1 - Giá: 200.000 VND</li>
                    </ul>
                </td>
                <td class="status cancelled">Đã hủy</td>
            </tr>
        </tbody>
    </table>

    <?php require_once './views/layout/footer.php'; ?>
</body>

</html>