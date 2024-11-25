<html>

<head>
    <title>Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/product/product.css?v=<?= time(); ?>">
</head>

<body>
    <?php require_once './views/layout/header.php'; ?>
    <div class="container">
        <aside class="sidebar">
            <div class="brand-logos">
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <!-- Sửa href để đảm bảo tham số id được truyền đúng -->
                            <button class="<?= isset($_GET['id']) && $_GET['id'] == $category['id'] ? 'active' : ''; ?>">
                                <a href="?act=view-products&id=<?= $category['id']; ?>">
                                    <?= htmlspecialchars($category['ten_danh_muc']); ?>
                                </a>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>


        <main class="main-content">
            <div class="filters">
                <button>FILTER</button>
                <select>
                    <option>PRICE</option>
                </select>
            </div>

            <div class="product-grid">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <!-- Liên kết tới chi tiết sản phẩm -->
                            <a href="./?act=product-detail&id=<?= $product['id']; ?>">
                                <img src="<?= htmlspecialchars($product['hinh_anh']); ?>" alt="Product Image">
                            </a>
                            <div class="name">
                                <?= htmlspecialchars($product['ten_san_pham']); ?>
                            </div>
                            <div class="price">
                                <?= number_format($product['gia_ban'], 0, ',', '.'); ?> VND
                            </div>
                            <div class="rating">
                                <!-- Hiển thị sao đánh giá -->
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found. Please select a brand.</p>
                <?php endif; ?>
            </div>

        </main>
    </div>

    <?php require_once './views/layout/footer.php'; ?>
    <script src="http://localhost/Duan1/Project1_Team4/assets/js/home.js"></script>
</body>

</html>