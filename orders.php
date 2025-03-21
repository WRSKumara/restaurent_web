<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-center">Place Your Order</h2>
        <form action="order.php" method="POST" class="text-center">
            <div class="form-group">
                <input type="text" name="customer_name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="text" name="item_name" class="form-control" placeholder="Item Name" required>
            </div>
            <div class="form-group">
                <select name="size" class="form-control" required>
                    <option value="" disabled selected>Select Size</option>
                    <option value="Large">Large</option>
                    <option value="Medium">Medium</option>
                    <option value="Small">Small</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="order_details" class="form-control" placeholder="Your Order" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
