<!-- filepath: c:\xampp\htdocs\restaurent_web\index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/carro1.jpg" class="d-block w-100" height="700" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/carro2.jpg" class="d-block w-100" height="700" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/carro3.jpg" class="d-block w-100" height="700" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="container mt-5">
        <h2 class="text-center">Delicious Food, Just for You!</h2>
        <p class="text-center">Explore our menu and place your order.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-custom mb-4">
                    <img src="images/hcart1.jpg" class="card-img-top" alt="Rice & Curry">
                    <div class="card-body">
                        <h5 class="card-title">Rice & Curry</h5>
                        <p class="card-text">A delightful combination of rice and curry, perfect for any meal.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-custom mb-4">
                    <img src="images/hcart2.jpg" class="card-img-top" alt="Fried Rice">
                    <div class="card-body">
                        <h5 class="card-title">Fried Rice</h5>
                        <p class="card-text">Delicious fried rice with a mix of vegetables and your choice of protein.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-custom mb-4">
                    <img src="images/hcart3.jpg" class="card-img-top" alt="Kottu">
                    <div class="card-body">
                        <h5 class="card-title">Kottu</h5>
                        <p class="card-text">A popular Sri Lankan dish made with chopped roti, vegetables, and meat.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Find Us on Google Maps</h3>
                <div class="text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.947042509048!2d79.9713483153169!3d6.8441079797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae250b1f1f1f1f1%3A0x3ae250b1f1f1f1f1!2sR2GH%2BV9F%2C%20Pitipana%20-%20Thalagala%20Rd%2C%20Homagama!5e0!3m2!1sen!2slk!4v1614311234567!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h2 class="text-center">Visit Our Restaurant</h2>
                <p class="text-center">Experience the best dining experience at our restaurant. Enjoy our delicious food in a cozy and welcoming atmosphere.</p>
                <div class="text-center">
                    <a href="contact.php" class="btn btn-primary">Get Directions</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>