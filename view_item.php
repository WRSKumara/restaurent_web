<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = [
        'name' => $_POST['name'],
        'image' => $_POST['image'],
        'size' => $_POST['size'],
        'price' => (float)$_POST['price'], // Ensure price is passed
        'quantity' => (int)$_POST['quantity'],
        'totalPrice' => (float)$_POST['price'] * (int)$_POST['quantity']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $item;

    header('Location: view_cart.php');
    exit;
}

// Retrieve item details from the query string
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Unknown Item';
$image = isset($_GET['image']) ? htmlspecialchars($_GET['image']) : 'default.jpg';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : 'No description available.';
$prices = isset($_GET['prices']) ? json_decode($_GET['prices'], true) : [];

// Function to read reviews from file
function getReviews($itemName) {
    $reviews = [];
    $file = 'reviews.txt';
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $parts = explode('|', $line);
            if (count($parts) >= 4 && $parts[0] === $itemName) {
                $reviews[] = [
                    'name' => $parts[1],
                    'review' => $parts[2],
                    'rating' => $parts[3],
                    'date' => $parts[4] ?? date('Y-m-d')
                ];
            }
        }
    }
    return array_reverse($reviews); // Show newest reviews first
}

$reviews = getReviews($name);
$averageRating = $reviews ? array_sum(array_column($reviews, 'rating')) / count($reviews) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item - <?= $name ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .item-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-top: 30px;
        }
        .item-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .item-image:hover {
            transform: scale(1.05);
        }
        .price-tag {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .review-card {
            background-color: #f1f3f5;
            border-left: 4px solid #007bff;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 5px;
        }
        .star-rating {
            color: #ffc107;
        }
        .add-review-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .quantity-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="item-container">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="images/<?= $image ?>" class="item-image" alt="<?= $name ?>">
                </div>
                <div class="col-md-6 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="mb-0"><?= $name ?></h1>
                        <div class="star-rating">
                            <?php 
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= round($averageRating) 
                                    ? '<i class="fas fa-star"></i>' 
                                    : '<i class="far fa-star"></i>';
                            }
                            ?>
                            <small class="text-muted ms-2">(<?= count($reviews) ?> reviews)</small>
                        </div>
                    </div>

                    <p class="text-muted mb-4"><?= $description ?></p>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="size" class="form-label">Select Size</label>
                            <select name="size" id="size" class="form-select" required onchange="updatePrice()">
                                <?php foreach ($prices as $size => $price): ?>
                                    <option value="<?= $size ?>" data-price="<?= $price ?>">
                                        <?= $size ?> - $<?= number_format($price, 2) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity(-1)">-</button>
                                <input type="number" name="quantity" id="quantity" class="form-control text-center" min="1" value="1" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity(1)">+</button>
                            </div>
                        </div>

                        <!-- Hidden input to store the price -->
                        <input type="hidden" name="price" id="price" value="<?= reset($prices) ?>">

                        <input type="hidden" name="name" value="<?= $name ?>">
                        <input type="hidden" name="image" value="<?= $image ?>">
                        <input type="hidden" name="description" value="<?= $description ?>">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2 class="mb-4">Customer Reviews</h2>
            
            <?php if (empty($reviews)): ?>
                <div class="alert alert-info">No reviews yet. Be the first to review!</div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($reviews as $review): ?>
                        <div class="col-md-6 mb-3">
                            <div class="review-card">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong><?= htmlspecialchars($review['name']) ?></strong>
                                    <div class="star-rating">
                                        <?php 
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $review['rating'] 
                                                ? '<i class="fas fa-star"></i>' 
                                                : '<i class="far fa-star"></i>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <p class="text-muted"><?= htmlspecialchars($review['review']) ?></p>
                                <small class="text-muted"><?= $review['date'] ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="add-review-section mt-4">
                <h3 class="mb-3">Add Your Review</h3>
                <form action="add_review.php" method="GET">
                    <input type="hidden" name="item_name" value="<?= $name ?>">
                    <a href="add_review.php?item_name=<?= urlencode($name) ?>" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Write a Review
                    </a>
                </form>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updatePrice() {
            const sizeSelect = document.getElementById('size');
            const selectedOption = sizeSelect.options[sizeSelect.selectedIndex];
            const priceInput = document.getElementById('price');
            priceInput.value = selectedOption.getAttribute('data-price');
        }

        function updateQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            let newValue = currentValue + change;

            if (newValue >= 1) {
                quantityInput.value = newValue;
            }
        }
    </script>
</body>
</html>