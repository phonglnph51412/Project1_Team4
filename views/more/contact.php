<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Shoe Store</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/more/contact.css">
</head>

<body>
    
    <main class="container">
    <?php require_once '../layout/header.php' ?>    
        <div class="row">
            <!-- Contact Information -->
            <div class="col-6 contact-info">
                <h2>Our Store</h2>
                <p><strong>Address:</strong> 123 Shoe Street, Sneaker City</p>
                <p><strong>Phone:</strong> +1 234 567 890</p>
                <p><strong>Email:</strong> support@shoestore.com</p>
                <h3>Opening Hours</h3>
                <ul>
                    <li>Monday - Friday: 9:00 AM - 8:00 PM</li>
                    <li>Saturday: 10:00 AM - 6:00 PM</li>
                    <li>Sunday: Closed</li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="col-6 contact-form">
                <h2>Send Us a Message</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Type your message here..."
                            required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Send Message</button>
                </form>
            </div>
        </div>
    <?php require_once '../layout/footer.php' ?>    
    </main>
    

</body>

</html>