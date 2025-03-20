<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
                <img src="images/3998.jpg" class="d-block w-100" height="700" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/images.jpeg" class="d-block w-100" height="700" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/image2.jpg" class="d-block w-100" height="700" alt="...">
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
                <div class="card">
                    <img src="menu-item1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Menu Item 1</h5>
                        <p class="card-text">Description of menu item 1.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="menu-item2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Menu Item 2</h5>
                        <p class="card-text">Description of menu item 2.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="menu-item3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Menu Item 3</h5>
                        <p class="card-text">Description of menu item 3.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
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