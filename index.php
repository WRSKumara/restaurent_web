<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious Flavors Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff6b6b;
            --secondary-color: #4ecdc4;
            --dark-color: #2f3542;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: var(--dark-color);
        }

        /* Carousel Styling */
        .carousel-item img {
            object-fit: cover;
            filter: brightness(0.7);
        }

        .carousel-caption {
            background: rgba(0,0,0,0.5);
            border-radius: 10px;
            padding: 20px;
        }

        /* Featured Dishes Section */
        .featured-dishes {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px 20px;
        }

        .featured-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .featured-card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .featured-card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .featured-card:hover img {
            transform: scale(1.1);
        }

        .btn-order {
            background-color: var(--primary-color);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-order:hover {
            background-color: #ff4757;
            transform: translateY(-3px);
        }

        /* Location Section */
        .location-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px 20px;
        }

        .section-title {
            position: relative;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: var(--primary-color);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .carousel-item img {
                height: 400px;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Enhanced Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/carro1.jpg" class="d-block w-100" alt="Delicious Dishes">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Discover Authentic Flavors</h1>
                    <p>Experience the best of Sri Lankan cuisine</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/carro2.jpg" class="d-block w-100" alt="Restaurant Interior">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Cozy Dining Experience</h1>
                    <p>Enjoy our warm and welcoming atmosphere</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/carro3.jpg" class="d-block w-100" alt="Fresh Ingredients">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Fresh & Locally Sourced</h1>
                    <p>We use the finest local ingredients</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

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
                        'image' => 'images/hcart1.jpg',
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
    <section class="container mt-5">
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
</body>
</html>