<?php
include 'db.php';

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
echo "<h2>Orders Received</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row["customer_name"] . ":</strong> " . $row["order_details"] . "</p>";
}
$conn->close();
?>
