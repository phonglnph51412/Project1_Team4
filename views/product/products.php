<html>
<head>
    <title>
        Product
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/product/product.css"> -->
</head>
 <style>
    /* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    padding: 20px;
    color: #1a1a1a;
}

.header .logo {
    font-size: 24px;
    font-weight: bold;
}

.header nav a {
    color: #1a1a1a;
    margin: 0 15px;
    text-decoration: none;
    font-size: 16px;
}

.header nav a:hover {
    text-decoration: underline;
}

.header .icons a {
    color: #1a1a1a;
    margin-left: 20px;
    font-size: 20px;
}

.header .icons a:hover {
    color: #f39c12;
}

/* Sidebar */
.sidebar {
    background-color: #fff;
    width: 250px;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    overflow-y: auto;
}

.sidebar button {
    background-color: #f39c12;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    margin-bottom: 10px;
    cursor: pointer;
    text-align: left;
    border-radius: 5px;
    font-size: 16px;
}

.sidebar button:hover {
    background-color: #e67e22;
}

.sidebar a {
    text-decoration: none;
    color: #333;
    display: block;
    padding: 10px;
    font-size: 16px;
}

.sidebar a:hover {
    background-color: #f1f1f1;
}

/* Main Content */
.container {
    display: flex;
    margin-left: 250px;
    padding: 20px;
}

.main-content {
    flex-grow: 1;
    margin-left: 20px;
}

.filters {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.filters button {
    background-color: #f39c12;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.filters select {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 16px;
}

.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 15px;
    width: calc(33.33% - 20px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: scale(1.05);
}

.product-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.product-image:hover {
    transform: scale(1.1);
}

.name {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
}

.price {
    font-size: 16px;
    color: #f39c12;
    margin-top: 5px;
}

.rating i {
    /* color: #f39c12; */
    color: #1a1a1a;
}

/* Footer */

.footer {
    margin-top: 40px;
    background-color: #333;
    color: white;
    padding: 40px 0;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    text-align: left;
}

.footer .column {
    width: 300px;
    margin-bottom: 20px;
}

.footer .column h3 {
    font-size: 18px;
    margin-bottom: 10px;
    font-weight: bold;
}

.footer .column a {
    text-decoration: none;
    color: white;
    font-size: 14px;
    margin-bottom: 10px;
    display: block;
}

.footer .column a:hover {
    text-decoration: underline;
}

.footer .social-icons a {
    color: white;
    margin: 0 10px;
    font-size: 20px;
}

.footer .social-icons a:hover {
    color: #f39c12;
}

/* Responsive */
@media (max-width: 1024px) {
    .container {
        margin-left: 0;
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        position: relative;
        box-shadow: none;
    }

    .product-card {
        width: calc(50% - 20px);
    }
}

@media (max-width: 768px) {
    .product-card {
        width: 100%;
    }

    .footer .column {
        width: 100%;
        margin-bottom: 20px;
    }

    .header nav {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .header .icons {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
}

 </style>
<body>
    <header class="header">
        <div class="logo">
            Prime
        </div>
        <nav>
            <a href="#">
                Home
            </a>
            <a href="#">
                Products
            </a>
            <a href="#">
                About Us
            </a>
            <a href="#">
                Support
            </a>
            <a href="#">
                Contact
            </a>
        </nav>
        <div class="icons">
            <a href="#">
                <i class="fas fa-heart">
                </i>
            </a>
            <a href="#">
                <i class="fas fa-shopping-cart">
                </i>
            </a>
            <a href="#">
                <i class="fas fa-user">
                </i>
            </a>
        </div>
    </header>
    <div class="container">
        <aside class="sidebar">
        <?php foreach( $danhmuc as $danhmucs):   ?>
           <button type="submit">
            <a href="?act=home&id_danh_muc=<?= $danhmucs['id'] ?>"> <?= $danhmucs['ten_danh_muc'] ?></a>
           </button>
        <?php endforeach ?>

        </aside>
        <main class="main-content">
            <div class="filters">
                <button>
                    FILTER
                </button>
                <select>
                    <option>
                        PRICE
                    </option>
                </select>
            </div>
            <div class="product-grid">
                <?php foreach( $listSanPham as $key => $sanPham): ?>
                <div class="product-card">
                    <img alt="Product image" class="product-image" src="<?= $sanPham['hinh_anh'] ?>" />
                    <div class="name">
                        <?= $sanPham['ten_san_pham'] ?>
                    </div>
                    <div class="price">
                        <?= number_format($sanPham['gia_ban'], 0, ',', '.') ?> VND
                    </div>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
    <footer class="footer">
        <div class="column">
            <div class="logo">
                Prime
            </div>
            <p>
                Providing world-leading language certifications
            </p>
            <p>
                00000 11133
            </p>
            <p>
                Address line 1
            </p>
            <p>
                Address line 2
            </p>
            <div class="social-icons">
                <a href="#">
                    <i class="fab fa-facebook-f">
                    </i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter">
                    </i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram">
                    </i>
                </a>
                <a href="#">
                    <i class="fab fa-linkedin-in">
                    </i>
                </a>
            </div>
        </div>
        <div class="column">
            <h3>
                Registration Guide
            </h3>
            <a href="#">
                How to register
            </a>
            <a href="#">
                FAQs
            </a>
            <a href="#">
                Support
            </a>
        </div>
        <div class="column">
            <h3>
                Customer Support
            </h3>
            <a href="#">
                Contact Us
            </a>
            <a href="#">
                Shipping
            </a>
            <a href="#">
                Returns
            </a>
        </div>
    </footer>
</body>