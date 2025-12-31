<?php
include "../config/database.php";

// Prepare statement
$stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");

if ($stmt) {
    // Bind parameters: "sss" = string, string, string
    $stmt->bind_param("sss", $name, $email, $message);

    // Set variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Execute the statement
    if ($stmt->execute()) {
        // ✅ Redirect after successful insert
        header("Location: ../contact.php"); // or use another page like index.php?status=success
        exit();
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
?>
