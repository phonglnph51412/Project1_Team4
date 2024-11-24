<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/cart/cart.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <h1>Your Shopping Cart</h1>
        </div>
    </header>

    <main class="container">
        <!-- Cart Table -->
        <section class="cart">
            <div class="row cart-header">
                <div class="col-6">Product</div>
                <div class="col-2 text-center">Price</div>
                <div class="col-2 text-center">Quantity</div>
                <div class="col-2 text-center">Total</div>
            </div>
            <div class="row cart-item">
                <div class="col-6">
                    <img src="images/shoe3.png" alt="Product" class="cart-item-img">
                    <span>Nike Air Max</span>
                </div>
                <div class="col-2 text-center">$120.00</div>
                <div class="col-2 text-center">
                    <input type="number" value="1" min="1">
                </div>
                <div class="col-2 text-center">$120.00</div>
            </div>
            <div class="row cart-item">
                <div class="col-6">
                    <img src="images/shoe4.png" alt="Product" class="cart-item-img">
                    <span>Adidas Ultraboost</span>
                </div>
                <div class="col-2 text-center">$150.00</div>
                <div class="col-2 text-center">
                    <input type="number" value="2" min="1">
                </div>
                <div class="col-2 text-center">$300.00</div>
            </div>
            <div class="row cart-total">
                <div class="col-10 text-end"><strong>Grand Total:</strong></div>
                <div class="col-2 text-center">$420.00</div>
            </div>
            <div class="row cart-actions">
                <div class="col-12 text-end">
                    <button class="btn btn-update">Update Cart</button>
                    <button class="btn btn-checkout"><a href="./?act=view-pay">Proceed to Checkout</a></button>
                </div>
            </div>
        </section>
    </main>
</body>

</html>