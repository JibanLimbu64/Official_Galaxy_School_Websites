<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validate inputs (you should add more validation)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        die("All fields are required");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) 
                               VALUES (:first_name, :last_name, :email, :password)");
        
        // Bind parameters
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        
        // Execute the query
        if ($stmt->execute()) {
            // Redirect to success page or profile page
            header("Location: profile.php?email=" . urlencode($email));
            exit();
        } else {
            die("Registration failed");
        }
    } catch(PDOException $e) {
        if ($e->getCode() == 23000) {
            // Duplicate email error
            die("Email already exists");
        } else {
            die("Database error: " . $e->getMessage());
        }
    }
} else {
    // Not a POST request
    header("Location: ../authentication/profile.php");
    exit();
}
?>
<?php
require_once 'db_connection.php';

header('Content-Type: application/json');

try {
    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Validate inputs
    if (empty($input['firstName']) || empty($input['lastName']) || empty($input['email']) || empty($input['password'])) {
        throw new Exception("All fields are required");
    }
    
    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format");
    }
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->bindParam(':email', $input['email']);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        throw new Exception("Email already exists");
    }
    
    // Hash password
    $hashedPassword = password_hash($input['password'], PASSWORD_DEFAULT);
    
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) 
                           VALUES (:first_name, :last_name, :email, :password)");
    
    $stmt->bindParam(':first_name', $input['firstName']);
    $stmt->bindParam(':last_name', $input['lastName']);
    $stmt->bindParam(':email', $input['email']);
    $stmt->bindParam(':password', $hashedPassword);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'email' => $input['email']]);
    } else {
        throw new Exception("Registration failed");
    }
} catch(Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>