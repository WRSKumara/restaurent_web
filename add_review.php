<!-- filepath: c:\xampp\htdocs\restaurent_web\add_review.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = htmlspecialchars($_POST['customer_name']);
    $review = htmlspecialchars($_POST['review']);
    $item_name = htmlspecialchars($_POST['item_name']);

    // Save the review (replace this with database integration)
    $reviews_file = 'reviews.txt';
    $review_entry = "$item_name|$customer_name|$review\n";
    file_put_contents($reviews_file, $review_entry, FILE_APPEND);

    // Redirect back to the item page
    header("Location: view_item.php?name=" . urlencode($item_name));
    exit;
}
?>