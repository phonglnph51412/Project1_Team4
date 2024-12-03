<!-- views/cart/my_orders.php -->

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
            <!-- <?php var_dump($orders);  ?> -->
            <?php if (!empty($orders)): ?>
                <?php
                // Nhóm các đơn hàng theo order_id
                $groupedOrders = [];
                foreach ($orders as $order) {
                    $orderId = $order['order_id'];

                    // Nếu order_id chưa có trong mảng, tạo một mảng mới cho nó
                    if (!isset($groupedOrders[$orderId])) {
                        $groupedOrders[$orderId] = [
                            'order_id' => $orderId,
                            'order_date' => $order['order_date'],
                            'total_amount' => 0, // Tổng tiền cho tất cả các sản phẩm trong đơn hàng
                            'products' => [],
                            'status' => $order['status'],
                        ];
                    }

                    // Cộng dồn số lượng và giá trị cho mỗi sản phẩm trong đơn hàng
                    $groupedOrders[$orderId]['products'][] = [
                        'product_name' => $order['product_name'],
                        'quantity' => $order['quantity'],
                        'price' => $order['price'],
                    ];

                    // Cộng dồn tổng tiền
                    $groupedOrders[$orderId]['total_amount'] += $order['total_amount'];
                }

                // Hiển thị danh sách các đơn hàng gộp lại
                foreach ($groupedOrders as $group) {
                    echo "<tr>";
                    echo "<td>#{$group['order_id']}</td>";
                    echo "<td>" . date('d/m/Y', strtotime($group['order_date'])) . "</td>";
                    echo "<td>" . number_format($group['total_amount'], 0, '.', '.') . " VND</td>";
                    echo "<td>";
                    echo "<ul style='list-style: none;'>";

                    // Hiển thị các sản phẩm trong đơn hàng
                    foreach ($group['products'] as $product) {
                        echo "<li>{$product['product_name']} - SL: {$product['quantity']} - Giá: " . number_format($product['price'], 0, '.', '.') . " VND</li>";
                    }

                    echo "</ul>";
                    echo "</td>";
                    echo "<td class='status " . strtolower($group['status']) . "'>{$group['status']}</td>";
                    echo "</tr>";
                }
                ?>

            <?php else: ?>
                <tr>
                    <td colspan="5">Bạn chưa có đơn hàng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php require_once './views/layout/footer.php'; ?>
</body>

</html>