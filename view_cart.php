<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Handle delete action
if (isset($_GET['delete'])) {
    $deleteIndex = (int)$_GET['delete'];
    if (isset($cart[$deleteIndex])) {
        unset($cart[$deleteIndex]);
        $_SESSION['cart'] = array_values($cart); // Reindex the cart array
    }
    header('Location: view_cart.php');
    exit;
}

// Process selected items for checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout_selected'])) {
    if (isset($_POST['selected_items']) && is_array($_POST['selected_items'])) {
        $selectedItems = [];
        foreach ($_POST['selected_items'] as $index) {
            if (isset($cart[(int)$index])) {
                $selectedItems[] = $cart[(int)$index];
            }
        }
        
        $_SESSION['checkout_items'] = $selectedItems;
        header('Location: orders.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        .cart-container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        .cart-header {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .cart-header h1 {
            font-weight: 600;
            color: #2c3e50;
            font-size: 2.2rem;
        }
        
        .cart-header .cart-icon {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 2.5rem;
            color: #3498db;
        }
        
        .selection-bar {
            background: linear-gradient(145deg, #f0f0f0, #ffffff);
            padding: 20px;
            margin-bottom: 25px;
            border-radius: the 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .selection-button {
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .selection-button:hover {
            transform: translateY(-2px);
        }
        
        .select-all-btn {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }
        
        .select-all-btn:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .unselect-all-btn {
            background-color: #ecf0f1;
            border-color: #bdc3c7;
            color: #7f8c8d;
        }
        
        .unselect-all-btn:hover {
            background-color: #bdc3c7;
            color: #2c3e50;
        }
        
        .cart-table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        
        .cart-table thead th {
            border-top: none;
            border-bottom: 2px solid #3498db;
            color: #2c3e50;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 15px 10px;
        }
        
        .cart-table tbody tr {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .cart-table tbody tr:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .cart-table tbody td {
            padding: 20px 10px;
            vertical-align: middle;
            border: none;
        }
        
        .cart-table tbody tr td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        
        .cart-table tbody tr td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            border: 3px solid white;
        }
        
        .product-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.1rem;
        }
        
        .product-size {
            background-color: #f1f1f1;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .product-price {
            color: #2ecc71;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .product-quantity {
            font-weight: 500;
            background-color: #f1f1f1;
            padding: 5px 15px;
            border-radius: 20px;
        }
        
        .total-price {
            color: #e74c3c;
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .btn-delete {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .btn-delete:hover {
            background-color: #e74c3c;
            transform: rotate(90deg);
        }
        
        .btn-delete i {
            font-size: 1rem;
        }
        
        .custom-checkbox {
            width: 22px;
            height: 22px;
            cursor: pointer;
        }
        
        .total-summary {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .summary-card {
            border: none;
            background: transparent;
        }
        
        .summary-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }
        
        .summary-item {
            font-size: 1.1rem;
            color: #7f8c8d;
        }
        
        .summary-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e74c3c;
        }
        
        .footer-buttons {
            margin-top: 30px;
        }
        
        .btn-continue {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-continue:hover {
            background-color: #2980b9;
            transform: translateX(-5px);
        }
        
        .btn-checkout {
            background-color: #2ecc71;
            border-color: #2ecc71;
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .btn-checkout:hover {
            background-color: #27ae60;
            transform: translateX(5px);
        }
        
        .btn-checkout:disabled {
            background-color: #95a5a6;
            border-color: #95a5a6;
            cursor: not-allowed;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-cart-icon {
            font-size: 5rem;
            color: #bdc3c7;
            margin-bottom: 20px;
        }
        
        .empty-cart-message {
            font-size: 1.5rem;
            color: #7f8c8d;
            margin-bottom: 30px;
        }
        
        .btn-shop-now {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        
        .btn-shop-now:hover {
            background-color: #2980b9;
            transform: translateY(-5px);
        }
        
        /* Animation for items */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 30px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        
        .cart-table tbody tr {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        
        .cart-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .cart-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .cart-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .cart-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .cart-table tbody tr:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container cart-container">
        <div class="cart-header">
            <h1>Your Shopping Cart</h1>
            <span class="cart-icon"><i class="fas fa-shopping-cart"></i></span>
        </div>
        
        <?php if (empty($cart)): ?>
            <div class="empty-cart">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <p class="empty-cart-message">Your cart is empty. Let's add some items!</p>
                <a href="menu.php" class="btn btn-shop-now">
                    <i class="fas fa-utensils mr-2"></i> Browse Menu
                </a>
            </div>
        <?php else: ?>
            <form method="POST" action="view_cart.php">
                <div class="selection-bar">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" id="selectAllBtn" class="btn selection-button select-all-btn">
                                <i class="fas fa-check-square mr-2"></i> Select All Items
                            </button>
                            <button type="button" id="unselectAllBtn" class="btn selection-button unselect-all-btn ml-2">
                                <i class="fas fa-square mr-2"></i> Unselect All
                            </button>
                        </div>
                    </div>
                </div>
                
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th class="text-center">Select</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $index => $item): ?>
                            <tr>
                                <td class="text-center">
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input custom-checkbox item-checkbox" 
                                        data-price="<?= htmlspecialchars($item['totalPrice']) ?>"
                                        name="selected_items[]" 
                                        value="<?= $index ?>"
                                    >
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="product-img mr-3">
                                        <span class="product-name"><?= htmlspecialchars($item['name']) ?></span>
                                    </div>
                                </td>
                                <td><span class="product-size"><?= htmlspecialchars($item['size']) ?></span></td>
                                <td>
                                    <?php if ($item['price'] > 0): ?>
                                        <span class="product-price">$<?= number_format($item['price'], 2) ?></span>
                                    <?php else: ?>
                                        <span class="text-danger">Invalid Price</span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="product-quantity"><?= htmlspecialchars($item['quantity']) ?></span></td>
                                <td>
                                    <?php if ($item['totalPrice'] > 0): ?>
                                        <span class="total-price">$<?= number_format($item['totalPrice'], 2) ?></span>
                                    <?php else: ?>
                                        <span class="text-danger">Invalid Total</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="view_cart.php?delete=<?= $index ?>" class="btn btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div class="total-summary">
                    <div class="summary-card">
                        <div class="card-body">
                            <h4 class="summary-title">Order Summary</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="summary-item">Total for selected items:</span>
                                <strong id="selectedTotal" class="summary-value">$0.00</strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between footer-buttons">
                    <a href="menu.php" class="btn btn-continue">
                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping
                    </a>
                    <button type="submit" name="checkout_selected" id="checkoutSelectedBtn" class="btn btn-checkout" disabled>
                        <i class="fas fa-shopping-bag mr-2"></i> Checkout Selected
                    </button>
                </div>
            </form>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const checkboxes = document.querySelectorAll('.item-checkbox');
                    const selectAllBtn = document.getElementById('selectAllBtn');
                    const unselectAllBtn = document.getElementById('unselectAllBtn');
                    const selectedTotalElement = document.getElementById('selectedTotal');
                    const checkoutSelectedBtn = document.getElementById('checkoutSelectedBtn');
                    
                    // Calculate total price of selected items
                    function updateSelectedTotal() {
                        let total = 0;
                        let selectedCount = 0;
                        
                        checkboxes.forEach(checkbox => {
                            if (checkbox.checked) {
                                total += parseFloat(checkbox.getAttribute('data-price') || 0);
                                selectedCount++;
                            }
                        });
                        
                        selectedTotalElement.textContent = '$' + total.toFixed(2);
                        checkoutSelectedBtn.disabled = selectedCount === 0;
                        
                        // Add animation to the total
                        selectedTotalElement.classList.add('animate__animated', 'animate__pulse');
                        setTimeout(() => {
                            selectedTotalElement.classList.remove('animate__animated', 'animate__pulse');
                        }, 500);
                    }
                    
                    // Add event listeners to checkboxes
                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', updateSelectedTotal);
                    });
                    
                    // Select all button
                    selectAllBtn.addEventListener('click', function() {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = true;
                        });
                        updateSelectedTotal();
                    });
                    
                    // Unselect all button
                    unselectAllBtn.addEventListener('click', function() {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                        updateSelectedTotal();
                    });
                    
                    // Initialize total
                    updateSelectedTotal();
                });
            </script>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>