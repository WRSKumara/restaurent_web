<?php
session_start();

// Use selected items if available, otherwise use the entire cart
$items = isset($_SESSION['checkout_items']) ? $_SESSION['checkout_items'] : $_SESSION['cart'] ?? [];

// Calculate total amount
$totalAmount = 0;
foreach ($items as $item) {
    $totalAmount += isset($item['totalPrice']) ? $item['totalPrice'] : 0;
}

// Process order submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data here (customer info, payment details, etc.)
    // You would typically save this to your database
    
    // Clear cart after successful order
    unset($_SESSION['cart']);
    unset($_SESSION['checkout_items']);
    
    // Redirect to success page or home
    // header('Location: success.php');
    // exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Secure Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6b6b;
            --secondary: #4ecdc4;
            --dark: #2d3436;
            --light: #f7f7f7;
            --gray: #dfe6e9;
            --success: #26de81;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }
        
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 15px;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmOWY5ZjkiIGZpbGwtb3BhY2l0eT0iMC40Ij48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTRNMTQgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTQiLz48L2c+PC9nPjwvc3ZnPg==');
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .page-title h1 {
            font-weight: 700;
            color: var(--dark);
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-block;
            margin-bottom: 10px;
            position: relative;
        }
        
        .page-title h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--primary);
        }
        
        .page-title p {
            color: #777;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 15px auto 0;
        }
        
        .checkout-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: white;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        
        .checkout-card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            border-bottom: none;
            padding: 15px 25px;
            position: relative;
            overflow: hidden;
        }
        
        .card-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.2rem;
            position: relative;
            z-index: 1;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            right: -20px;
            top: -20px;
            width: 120px;
            height: 120px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            right: 30px;
            bottom: -40px;
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .summary-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray);
        }
        
        .summary-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            background-color: var(--gray);
            position: relative;
        }
        
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .item-quantity {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--primary);
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }
        
        .item-details {
            flex: 1;
            padding: 0 15px;
        }
        
        .item-name {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1rem;
        }
        
        .item-size {
            color: #777;
            font-size: 0.9rem;
        }
        
        .item-price {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
        }
        
        .totals {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .totals-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }
        
        .totals-row.final {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px dashed var(--gray);
            font-size: 1.2rem;
            font-weight: 700;
        }
        
        .form-group label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .form-control {
            height: auto;
            padding: 15px;
            border-radius: 10px;
            border: 2px solid var(--gray);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 0.2rem rgba(78, 205, 196, 0.25);
        }
        
        .payment-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .payment-option {
            position: relative;
        }
        
        .payment-option input {
            position: absolute;
            opacity: 0;
            height: 0;
            width: 0;
        }
        
        .payment-option-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 2px solid var(--gray);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .payment-option input:checked + .payment-option-label {
            border-color: var(--secondary);
            background-color: rgba(78, 205, 196, 0.05);
        }
        
        .payment-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--dark);
            transition: all 0.3s ease;
        }
        
        .payment-option input:checked + .payment-option-label .payment-icon {
            color: var(--secondary);
        }
        
        .payment-title {
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .submit-btn {
            background-color: var(--success);
            border: none;
            padding: 15px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(38, 222, 129, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(38, 222, 129, 0.4);
            background-color: #20c977;
        }
        
        .back-link {
            color: var(--dark);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .back-link:hover {
            color: var(--primary);
            text-decoration: none;
        }
        
        .back-link i {
            margin-right: 8px;
        }
        
        .secure-checkout {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            color: #777;
            font-size: 0.9rem;
        }
        
        .secure-checkout i {
            color: var(--success);
            margin-right: 8px;
        }
        
        .discount-input {
            position: relative;
            margin-bottom: 20px;
        }
        
        .discount-input input {
            padding-right: 100px;
        }
        
        .discount-input button {
            position: absolute;
            right: 5px;
            top: 5px;
            background-color: var(--secondary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .discount-input button:hover {
            background-color: #3dbeb8;
        }
        
        .checkout-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .checkout-step {
            display: flex;
            align-items: center;
            margin: 0 20px;
            position: relative;
        }
        
        .checkout-step:not(:last-child)::after {
            content: '';
            position: absolute;
            right: -30px;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 2px;
            background-color: var(--gray);
        }
        
        .step-number {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: var(--gray);
            color: #777;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .step-text {
            font-weight: 600;
            color: #777;
            transition: all 0.3s ease;
        }
        
        .checkout-step.active .step-number {
            background-color: var(--primary);
            color: white;
        }
        
        .checkout-step.active .step-text {
            color: var(--primary);
        }
        
        .checkout-step.completed .step-number {
            background-color: var(--success);
            color: white;
        }
        
        @media (max-width: 767.98px) {
            .checkout-steps {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .checkout-step {
                margin: 10px 0;
            }
            
            .checkout-step:not(:last-child)::after {
                top: auto;
                right: auto;
                bottom: -15px;
                left: 17px;
                width: 2px;
                height: 20px;
                transform: none;
            }
            
            .payment-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-container">
        <div class="page-title">
            <h1>Checkout</h1>
            <p>You're just one step away from completing your purchase</p>
        </div>
        
        <div class="checkout-steps">
            <div class="checkout-step completed">
                <div class="step-number"><i class="fas fa-check"></i></div>
                <div class="step-text">Cart</div>
            </div>
            <div class="checkout-step active">
                <div class="step-number">2</div>
                <div class="step-text">Checkout</div>
            </div>
            <div class="checkout-step">
                <div class="step-number">3</div>
                <div class="step-text">Confirmation</div>
            </div>
        </div>
        
        <?php if (empty($items)): ?>
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-circle mr-2"></i>
                No items selected for checkout. <a href="view_cart.php" class="alert-link">Return to cart</a>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-card">
                        <div class="card-header">
                            <h4><i class="fas fa-user-circle mr-2"></i> Your Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="orders.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="(123) 456-7890" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="address">Delivery Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your complete shipping address" required></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label>Select Payment Method</label>
                                    <div class="payment-options">
                                        <div class="payment-option">
                                            <input type="radio" id="payment-cash" name="payment" value="cash" required>
                                            <label for="payment-cash" class="payment-option-label">
                                                <i class="fas fa-money-bill-wave payment-icon"></i>
                                                <span class="payment-title">Cash on Delivery</span>
                                            </label>
                                        </div>
                                        <div class="payment-option">
                                            <input type="radio" id="payment-card" name="payment" value="card" required>
                                            <label for="payment-card" class="payment-option-label">
                                                <i class="far fa-credit-card payment-icon"></i>
                                                <span class="payment-title">Credit Card</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn submit-btn">
                                        <i class="fas fa-lock mr-2"></i> Complete Purchase
                                    </button>
                                    
                                    <div class="secure-checkout">
                                        <i class="fas fa-shield-alt"></i> Secure SSL Encrypted Checkout
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="checkout-card">
                        <div class="card-header">
                            <h4><i class="fas fa-shopping-cart mr-2"></i> Order Summary</h4>
                        </div>
                        <div class="card-body">
                            <?php if (count($items) > 0): ?>
                                <?php foreach ($items as $item): ?>
                                <div class="summary-item">
                                    <div class="item-image">
                                        <img src="images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                        <div class="item-quantity"><?= htmlspecialchars($item['quantity']) ?></div>
                                    </div>
                                    <div class="item-details">
                                        <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
                                        <div class="item-size">Size: <?= htmlspecialchars($item['size']) ?></div>
                                    </div>
                                    <div class="item-price">$<?= number_format($item['totalPrice'], 2) ?></div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            
                            <div class="discount-input">
                                <input type="text" class="form-control" placeholder="Promo Code">
                                <button type="button">Apply</button>
                            </div>
                            
                            <div class="totals">
                                <div class="totals-row">
                                    <span>Subtotal</span>
                                    <span>$<?= number_format($totalAmount, 2) ?></span>
                                </div>
                                <div class="totals-row">
                                    <span>Shipping</span>
                                    <span>Free</span>
                                </div>
                                <div class="totals-row">
                                    <span>Tax</span>
                                    <span>$<?= number_format($totalAmount * 0.05, 2) ?></span>
                                </div>
                                <div class="totals-row final">
                                    <span>Total</span>
                                    <span>$<?= number_format($totalAmount * 1.05, 2) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="text-center mt-4 mb-4">
            <a href="view_cart.php" class="back-link">
                <i class="fas fa-long-arrow-alt-left"></i> Return to Cart
            </a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>