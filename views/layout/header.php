<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/layout/header.css?v=<?= time(); ?>">
</head>

<body>
    <header class="header">
        <div class="logo">
            <h2 style="font-weight: 600;">
                <a href="./" style="text-decoration: none; color: black;">
                    <span class="highlight">P</span>rime
                </a>
            </h2>
        </div>
        <nav class="nav">
            <a href="./">Home</a>
            <a href="./?act=view-products">Products</a>
            <a href="./?act=about-us">About Us</a>
            <a href="./?act=contact">Contact</a>
        </nav>
        <!-- Input Search -->

        <div class="icons" style="margin-right: 15px;">
            <!-- Biểu tượng tìm kiếm -->
            <input type="text" id="search-input" class="search-input" placeholder="Search..." style="display: none;">
            <img src="https://cdn-icons-png.flaticon.com/128/54/54481.png" alt="Search Icon" id="search-icon">

            <!-- Biểu tượng giỏ hàng -->
            <a href="./?act=my-cart" style="margin-right: 15px;"><img src="https://cdn-icons-png.flaticon.com/128/2211/2211008.png" alt="Cart Icon"></a>

            <!-- Biểu tượng profile -->
            <div class="profile-container">
                <img src="https://cdn-icons-png.flaticon.com/128/3024/3024605.png" alt="Profile Icon" class="profile">
                <!-- Menu dropdown -->
                <div class="profile-menu" id="profile-menu">
                    <!-- Nội dung sẽ được thêm hoặc thay đổi bằng JavaScript -->
                    <?php if (isset($_SESSION['email'])) { ?>
                        <a href="#">Account Info</a><br>
                        <a href="#">My Orders</a><br>
                        <a href="./?act=logout">Logout</a>

                    <?php } else { ?>
                        <a href=" http://localhost/Duan1/Project1_Team4/?act=login">Login</a>

                    <?php } ?>
                </div>
            </div>

        </div>


    </header>

    <script src="http://localhost/Duan1/Project1_Team4/assets/js/header.js?v=<?= time(); ?>">


    </script>
</body>

</html>