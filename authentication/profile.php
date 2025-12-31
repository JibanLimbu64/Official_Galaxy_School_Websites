<?php
require_once 'profile.php';

if (!isset($_GET['email'])) {
    header("Location: ../authentication/Login.php");
    exit();
}

$email = $_GET['email'];

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        die("User not found");
    }
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- Include your CSS and JS files here -->
</head>
<body>
    <!-- Display user profile information -->
    <h1>Welcome, <?php echo htmlspecialchars($user['first_name'] . ' ' . htmlspecialchars($user['last_name'])); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <!-- Rest of your profile page -->
</body>
</html>