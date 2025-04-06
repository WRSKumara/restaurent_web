<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious Flavors Restaurant</title>

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="hero-section">
    <div class="container">
        <div class="row align-items-center" id="hero-row">
            <div class="col-lg-6 col-md-12">
                <div class="hero-content">
                    <h1 class="hero-title">Enjoy Our<br>Delicious Meal</h1>
                    <p class="hero-subtitle">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <button class="btn btn-book">BOOK A TABLE</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="bbq-image">
                    <img src="path/to/grill-image.jpg" alt="Delicious BBQ Spread">
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Featured Dishes Section -->
    <section class="container mt-5">
        <h2 class="section-title">Delicious Food, Just for You!</h2>
        <p class="text-center mb-4">Explore our menu and place your order.</p>
        <div class="featured-dishes">
            <div class="row">
                <?php 
                $featuredDishes = [
                    [
                        'name' => 'Rice & Curry',
                        'image' => 'images/cart1.jpg',
                        'description' => 'A delightful combination of rice and curry, perfect for any meal.',
                        'link' => 'menu.php?category=rice-curry'
                    ],
                    [
                        'name' => 'Fried Rice',
                        'image' => 'images/hcart2.jpg',
                        'description' => 'Delicious fried rice with a mix of vegetables and your choice of protein.',
                        'link' => 'menu.php?category=fried-rice'
                    ],
                    [
                        'name' => 'Kottu',
                        'image' => 'images/hcart3.jpg',
                        'description' => 'A popular Sri Lankan dish made with chopped roti, vegetables, and meat.',
                        'link' => 'menu.php?category=kottu'
                    ]
                ];

                foreach ($featuredDishes as $dish): ?>
                <div class="col-md-4 mb-4">
                    <div class="card featured-card h-100">
                        <img src="<?= $dish['image'] ?>" class="card-img-top" alt="<?= $dish['name'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $dish['name'] ?></h5>
                            <p class="card-text text-muted"><?= $dish['description'] ?></p>
                            <a href="<?= $dish['link'] ?>" class="btn btn-order btn-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section class="container mt-5 mb-5">
        <div class="location-section">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="section-title">Find Us on Google Maps</h3>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.947042509048!2d79.9713483153169!3d6.8441079797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae250b1f1f1f1f1%3A0x3ae250b1f1f1f1f1!2sR2GH%2BV9F%2C%20Pitipana%20-%20Thalagala%20Rd%2C%20Homagama!5e0!3m2!1sen!2slk!4v1614311234567!5m2!1sen!2slk" 
                            width="100%" 
                            height="450" 
                            style="border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <h2 class="section-title">Visit Our Restaurant</h2>
                    <p class="mb-4">Experience the best dining experience at our restaurant. Enjoy our delicious food in a cozy and welcoming atmosphere.</p>
                    <a href="contact.php" class="btn btn-order btn-primary btn-lg">
                        <i class="fas fa-map-marker-alt me-2"></i>Get Directions
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>
</html>