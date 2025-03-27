<?php
session_start();

// Database connection details
$host = 'localhost';
$db   = 'restaurant_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Database connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Prepare SQL to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    
    try {
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect to dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            // Login failed
            $_SESSION['error'] = "Invalid username or password";
            header("Location: index.html");
            exit();
        }
    } catch (PDOException $e) {
        // Handle database errors
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header("Location: index.html");
        exit();
    }
}
?>