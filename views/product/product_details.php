<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($product['ten_san_pham']); ?> - Product Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/product/product_details.css?v=<?= time(); ?>">
</head>

<body>

    <?php require_once './views/layout/header.php'; ?>

    <div class="container">
        <!-- Hình ảnh và thông tin cơ bản -->
        <div class="product-image">
            <img alt="<?php echo htmlspecialchars($product['ten_san_pham']); ?>" height="400"
                src="<?php echo htmlspecialchars($product['hinh_anh']); ?>" width="400" />
            <h3>Product description</h3>
            <p><?php echo htmlspecialchars($product['mo_ta']); ?></p>
        </div>
        <div class="product-details">
            <h1>
                <?php echo htmlspecialchars($product['ten_san_pham']); ?>
            </h1>
            <div class="price">
                <?php echo number_format($product['gia_ban'], 0, ',', '.'); ?> VND
            </div>


            <!-- Màu sắc -->
            <div class="colors">
                <h3>Colors:</h3>
                <?php foreach ($productDetails as $detail): ?>
                    <span class="color-swatch"
                        style="background-color: <?php echo ($detail['ma_mau_hex']); ?>; 
                                 display: inline-block; 
                                 width: 30px; height: 30px; 
                                 border-radius: 50%; margin-right: 5px;"
                        onclick="updateStock('<?php echo ($detail['ma_mau_hex']); ?>', 'color')"></span>
                <?php endforeach; ?>
            </div>

            <!-- Kích thước -->
            <div class="sizes">
                <h3>Sizes:</h3>
                <?php foreach ($productDetails as $detail): ?>
                    <button class="size-button"
                        onclick="updateStock('<?php echo htmlspecialchars($detail['so_size']); ?>', 'size')">
                        <?php echo htmlspecialchars($detail['so_size']); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Số lượng tồn kho -->
            <div class="stock">
                <h3>Stock:</h3>
                <ul id="stock-list">
                    <!-- Số lượng sẽ được cập nhật bằng JavaScript -->
                </ul>
            </div>

            <!-- Nút thêm vào giỏ hàng -->
            <div class="buttons">
                <button class="add-to-cart">
                    Add to cart
                </button>
                <button class="buy-now">
                    Buy now
                </button>
            </div>
        </div>
    </div>

    <?php require_once './views/layout/footer.php'; ?>

    <script>
        // Dữ liệu về màu sắc, kích thước và tồn kho
        const productDetails = <?php echo json_encode($productDetails); ?>;

        // Lưu trữ lựa chọn hiện tại của người dùng
        let selectedColor = null;
        let selectedSize = null;

        // Cập nhật thông tin stock khi chọn màu sắc hoặc kích thước
        function updateStock(value, type) {
            if (type === 'color') {
                selectedColor = value;
            } else if (type === 'size') {
                selectedSize = value;
            }

            // Tìm kiếm trong dữ liệu để hiển thị số lượng tồn kho tương ứng
            const stockList = document.getElementById('stock-list');
            stockList.innerHTML = ''; // Xóa danh sách cũ

            let foundStock = false; // Biến kiểm tra xem có tìm thấy dữ liệu tồn kho hay không

            productDetails.forEach(detail => {
                if ((selectedColor === null || detail.ma_mau_hex === selectedColor) &&
                    (selectedSize === null || detail.so_size === selectedSize)) {

                    const stockItem = document.createElement('li');
                    stockItem.textContent = `Màu: ${detail.ten_mau}, Size: ${detail.so_size}, Số lượng: ${detail.so_luong}`;
                    stockList.appendChild(stockItem);
                    foundStock = true; // Đã tìm thấy kết quả, cập nhật flag
                }
            });

            // Nếu không tìm thấy dữ liệu tồn kho, hiển thị số lượng là 0
            if (!foundStock) {
                const stockItem = document.createElement('li');
                stockItem.textContent = 'Số lượng: 0';
                stockList.appendChild(stockItem);
            }
        }
    </script>

</body>

</html>