<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious Flavors - Our Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .menu-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.12);
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .card:hover .card-img-top {
            transform: scale(1.1);
        }
        .card-body {
            text-align: center;
            padding: 20px;
        }
        .btn-order {
            background-color: #ff6b6b;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-order:hover {
            background-color: #ff4757;
            transform: translateY(-3px);
        }
        .section-title {
            color: #2f3542;
            font-weight: bold;
            margin-bottom: 30px;
            position: relative;
            text-align: center;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: #ff6b6b;
        }
        .size-prices {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-weight: bold;
        }
        .size-prices .size-price {
            flex: 1;
            margin: 0 5px;
            padding: 5px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-5" style="color: #2f3542; font-weight: bold;">Our Delicious Menu</h1>
        
        <!-- Fried Rice Section -->
        <div class="menu-section">
            <h2 class="section-title">Fried Rice Specials</h2>
            <div class="row">
                <?php 
                $friedRices = [
                    ['name' => 'Chicken Fried Rice', 'image' => 'cart1.jpg', 'description' => 'Delicious chicken fried rice with a blend of spices', 
                     'prices' => ['Small' => 9.99, 'Medium' => 12.99, 'Large' => 15.99]],
                    ['name' => 'Egg Fried Rice', 'image' => 'cart2.jpg', 'description' => 'Tasty egg fried rice with fresh vegetables', 
                     'prices' => ['Small' => 8.99, 'Medium' => 10.99, 'Large' => 13.99]],
                    ['name' => 'Seafood Fried Rice', 'image' => 'cart3.jpg', 'description' => 'A delightful mix of seafood and fried rice', 
                     'prices' => ['Small' => 11.99, 'Medium' => 15.99, 'Large' => 18.99]],
                    ['name' => 'Mix Fried Rice', 'image' => 'cart4.jpg', 'description' => 'A perfect combination of flavors in every bite', 
                     'prices' => ['Small' => 10.99, 'Medium' => 14.99, 'Large' => 17.99]]
                ];

                foreach ($friedRices as $rice): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="images/<?= $rice['image'] ?>" class="card-img-top" alt="<?= $rice['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $rice['name'] ?></h5>
                            <p class="card-text text-muted"><?= $rice['description'] ?></p>
                            <a href="view_item.php?name=<?= urlencode($rice['name']) ?>&image=<?= urlencode($rice['image']) ?>&description=<?= urlencode($rice['description']) ?>&prices=<?= urlencode(json_encode($rice['prices'])) ?>" class="btn btn-order btn-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                            <div class="size-prices">
                                <?php foreach ($rice['prices'] as $size => $price): ?>
                                    <div class="size-price">
                                        <?= $size ?>: $<?= number_format($price, 2) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Biryani Section -->
        <div class="menu-section">
            <h2 class="section-title">Biryani Delights</h2>
            <div class="row">
                <?php 
                $biryanis = [
                    ['name' => 'Chicken Biryani', 'image' => 'cart5.jpg', 'description' => 'Aromatic chicken biryani with rich spices', 
                     'prices' => ['Small' => 11.99, 'Medium' => 14.99, 'Large' => 17.99]],
                    ['name' => 'Beef Biryani', 'image' => 'cart6.jpg', 'description' => 'Flavorful beef biryani cooked to perfection', 
                     'prices' => ['Small' => 12.99, 'Medium' => 16.99, 'Large' => 19.99]],
                    ['name' => 'Prawn Biryani', 'image' => 'cart7.jpg', 'description' => 'Delicious prawn biryani with a hint of saffron', 
                     'prices' => ['Small' => 13.99, 'Medium' => 17.99, 'Large' => 20.99]],
                    ['name' => 'Vegetable Biryani', 'image' => 'cart8.jpg', 'description' => 'Healthy and flavorful vegetable biryani', 
                     'prices' => ['Small' => 10.99, 'Medium' => 13.99, 'Large' => 16.99]]
                ];

                foreach ($biryanis as $biryani): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="images/<?= $biryani['image'] ?>" class="card-img-top" alt="<?= $biryani['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $biryani['name'] ?></h5>
                            <p class="card-text text-muted"><?= $biryani['description'] ?></p>
                            <a href="view_item.php?name=<?= urlencode($biryani['name']) ?>&image=<?= urlencode($biryani['image']) ?>&description=<?= urlencode($biryani['description']) ?>&prices=<?= urlencode(json_encode($biryani['prices'])) ?>" class="btn btn-order btn-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                            <div class="size-prices">
                                <?php foreach ($biryani['prices'] as $size => $price): ?>
                                    <div class="size-price">
                                        <?= $size ?>: $<?= number_format($price, 2) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Rice & Curry Section -->
        <div class="menu-section">
            <h2 class="section-title">Rice & Curry Classics</h2>
            <div class="row">
                <?php 
                $riceAndCurries = [
                    ['name' => 'Vegetable Rice & Curry', 'image' => 'cart1.jpg', 'description' => 'A healthy and flavorful vegetable curry served with rice', 
                     'prices' => ['Small' => 9.99, 'Medium' => 11.99, 'Large' => 14.99]],
                    ['name' => 'Chicken Rice & Curry', 'image' => 'cart2.jpg', 'description' => 'Delicious chicken curry served with steamed rice', 
                     'prices' => ['Small' => 10.99, 'Medium' => 13.99, 'Large' => 16.99]],
                    ['name' => 'Egg Rice & Curry', 'image' => 'cart3.jpg', 'description' => 'A simple yet tasty egg curry served with rice', 
                     'prices' => ['Small' => 8.99, 'Medium' => 10.99, 'Large' => 13.99]],
                    ['name' => 'Pork Rice & Curry', 'image' => 'cart4.jpg', 'description' => 'Rich and flavorful pork curry served with rice', 
                     'prices' => ['Small' => 11.99, 'Medium' => 14.99, 'Large' => 17.99]]
                ];

                foreach ($riceAndCurries as $dish): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="images/<?= $dish['image'] ?>" class="card-img-top" alt="<?= $dish['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $dish['name'] ?></h5>
                            <p class="card-text text-muted"><?= $dish['description'] ?></p>
                            <a href="view_item.php?name=<?= urlencode($dish['name']) ?>&image=<?= urlencode($dish['image']) ?>&description=<?= urlencode($dish['description']) ?>&prices=<?= urlencode(json_encode($dish['prices'])) ?>" class="btn btn-order btn-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                            <div class="size-prices">
                                <?php foreach ($dish['prices'] as $size => $price): ?>
                                    <div class="size-price">
                                        <?= $size ?>: $<?= number_format($price, 2) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Kottu Section -->
        <div class="menu-section">
            <h2 class="section-title">Kottu Varieties</h2>
            <div class="row">
                <?php 
                $kottus = [
                    ['name' => 'Chicken Kottu', 'image' => 'cart5.jpg', 'description' => 'A popular Sri Lankan dish made with shredded roti and chicken', 
                     'prices' => ['Small' => 10.99, 'Medium' => 12.99, 'Large' => 15.99]],
                    ['name' => 'Vegetable Kottu', 'image' => 'cart6.jpg', 'description' => 'A vegetarian version of the classic kottu dish', 
                     'prices' => ['Small' => 9.99, 'Medium' => 11.99, 'Large' => 14.99]],
                    ['name' => 'Egg Kottu', 'image' => 'cart7.jpg', 'description' => 'A delicious kottu dish made with eggs and spices', 
                     'prices' => ['Small' => 9.99, 'Medium' => 11.99, 'Large' => 14.99]],
                    ['name' => 'Cheese Kottu', 'image' => 'cart8.jpg', 'description' => 'A cheesy twist on the classic kottu dish', 
                     'prices' => ['Small' => 11.99, 'Medium' => 13.99, 'Large' => 16.99]]
                ];

                foreach ($kottus as $kottu): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="images/<?= $kottu['image'] ?>" class="card-img-top" alt="<?= $kottu['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $kottu['name'] ?></h5>
                            <p class="card-text text-muted"><?= $kottu['description'] ?></p>
                            <a href="view_item.php?name=<?= urlencode($kottu['name']) ?>&image=<?= urlencode($kottu['image']) ?>&description=<?= urlencode($kottu['description']) ?>&prices=<?= urlencode(json_encode($kottu['prices'])) ?>" class="btn btn-order btn-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                            <div class="size-prices">
                                <?php foreach ($kottu['prices'] as $size => $price): ?>
                                    <div class="size-price">
                                        <?= $size ?>: $<?= number_format($price, 2) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>