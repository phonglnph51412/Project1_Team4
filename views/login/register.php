<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prime | Login</title>
  <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/login/register.css">
</head>

<body>
  <div class="container">
    <!-- Header -->
    <header>
      <h1><span class="blue">P</span>rime | Login</h1>
      <a href="#" class="help-link">Need help?</a>
    </header>

    <!-- Main Content -->
    <main>
      <div class="login-section">
        <img src="/img/image.png" alt="Shoes" class="product-image">
        <form class="login-form" action="process.php" method="POST">
          <h2>Register</h2>
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" placeholder="+84" required>

          <button type="submit" class="login-button">Next</button>

          <div class="social-login">
            <button type="button" class="facebook-login">Facebook</button>
            <button type="button" class="google-login">Google</button>
          </div>

          <a href="/login/login.html" class="forgot-link">Forgot Password / Login</a>
        </form>
      </div>
  </div>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <!-- Brand Information -->
      <div class="brand-info">
        <h3><span class="blue">P</span>rime</h3>
        <p>Providing world-leading language certification</p>
      </div>
      <!-- Support Information -->
      <div class="support">
        <h4>You need support</h4>
        <p>0000 1133</p>
        <p>Address: Nam Tu Liem, Hanoi</p>
        <p>Email: support@prime.vn</p>
        <div class="payment-methods">
          <img src="/img/visa.png" height="50px" alt="Visa">
          <img src="/img/paypal.png" height="50px" alt="Paypal">
        </div>
      </div>
      <!-- Links Section -->
      <div class="links">
        <h4>Registration Guide</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Introduction</a></li>
          <li><a href="#">Courses</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">User Guide</a></li>
        </ul>
      </div>

  </footer>
  </div>
</body>

</html>