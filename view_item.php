<!-- filepath: c:\xampp\htdocs\restaurent_web\view_item.php -->
<?php
// Retrieve item details from the query string
$item = isset($_GET['item']) ? htmlspecialchars($_GET['item']) : 'Unknown Item';
$image = isset($_GET['image']) ? htmlspecialchars($_GET['image']) : 'default.jpg';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : 'No description available.';

// Example sizes and reviews (you can replace this with database data)
$sizes = [
    'Large' => 10,
    'Medium' => 8,
    'Small' => 6
];
$reviews = [
    ['name' => 'John Doe', 'review' => 'Amazing taste!'],
    ['name' => 'Jane Smith', 'review' => 'Loved it!']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item - <?= $item ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $image ?>" class="img-fluid" alt="<?= $item ?>">
            </div>
            <div class="col-md-6">
                <h1><?= $item ?></h1>
                <p><?= $description ?></p>
                <form action="cart.php" method="POST">
                    <h3>Sizes</h3>
                    <?php foreach ($sizes as $size => $price): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" value="<?= $size ?>" required>
                            <label class="form-check-label"><?= $size ?>: $<?= $price ?></label>
                        </div>
                    <?php endforeach; ?>
                    <div class="form-group mt-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" min="1" value="1" required>
                    </div>
                    <input type="hidden" name="item" value="<?= $item ?>">
                    <input type="hidden" name="image" value="<?= $image ?>">
                    <input type="hidden" name="description" value="<?= $description ?>">
                    <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                </form>
                <h3 class="mt-5">Customer Reviews</h3>
                <?php foreach ($reviews as $review): ?>
                    <div class="review">
                        <strong><?= $review['name'] ?>:</strong>
                        <p><?= $review['review'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>