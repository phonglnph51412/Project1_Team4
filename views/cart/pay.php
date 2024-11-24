<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/pay.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <h1>Payment Details</h1>
        </div>
    </header>

    <main class="container">
        <form action="#" method="post" class="payment-form">
            <!-- Billing Details -->
            <section class="billing-details">
                <h2>Billing Information</h2>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="zip">Postal Code</label>
                    <input type="text" id="zip" name="zip" required>
                </div>
            </section>

            <!-- Payment Details -->
            <section class="payment-details">
                <h2>Payment Information</h2>
                <div class="form-group">
                    <label for="card-name">Cardholder Name</label>
                    <input type="text" id="card-name" name="card-name" required>
                </div>
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" required>
                </div>
                <div class="form-group">
                    <label for="expiry">Expiry Date</label>
                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
            </section>

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" class="btn btn-pay">Complete Payment</button>
            </div>
        </form>
    </main>
</body>

</html>