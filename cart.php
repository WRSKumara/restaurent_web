<!-- filepath: c:\xampp\htdocs\restaurent_web\cart.php -->
<?php
session_start();

// Retrieve the form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$image = isset($_POST['image']) ? htmlspecialchars($_POST['image']) : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
$size = isset($_POST['size']) ? htmlspecialchars($_POST['size']) : '';
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
$price = isset($_POST['price']) ? (float)$_POST['price'] : 0;

// Calculate total price for the item
$totalPrice = $price * $quantity;

// Create a cart item
$cartItem = [
    'name' => $name,
    'image' => $image,
    'description' => $description,
    'size' => $size,
    'quantity' => $quantity,
    'price' => $price,
    'totalPrice' => $totalPrice,
];

// Add the item to the session cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$_SESSION['cart'][] = $cartItem;

// Redirect to the cart page
header('Location: view_cart.php');
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-center">Your Cart</h2>

        <?php if (isset($_POST['items']) && isset($_POST['quantities'])): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_price = 0;
                    foreach ($_POST['items'] as $index => $item): 
                        list($item_name, $size, $price) = explode('|', $item);
                        $quantity = $_POST['quantities'][$index];
                        $item_total = $price * $quantity;
                        $total_price += $item_total;
                        $item['totalPrice'] = $item['price'] * $item['quantity'];
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item_name); ?></td>
                            <td><?php echo htmlspecialchars($size); ?></td>
                            <td><?php echo htmlspecialchars($price); ?></td>
                            <td><?php echo htmlspecialchars($quantity); ?></td>
                            <td><?php echo htmlspecialchars($item_total); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total Price</strong></td>
                        <td><strong><?php echo htmlspecialchars($total_price); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Your cart is empty.</p>
        <?php endif; ?>

        <div class="text-center">
            <a href="menu.php" class="btn btn-primary">Continue Shopping</a>
            <a href="orders.php" class="btn btn-success">Proceed to Checkout</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>