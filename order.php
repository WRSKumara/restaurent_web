<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST["customer_name"];
    $phone = $_POST["phone"];
    $order_details = $_POST["order_details"];

    $sql = "INSERT INTO orders (customer_name, phone, order_details) VALUES ('$customer_name', '$phone', '$order_details')";
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
