<?php
// Signup logic using mysqli
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars(trim($_POST['username'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Validate inputs
    if (!preg_match("/^[a-zA-Z]{2,50}$/", $username)) {
        $errors[] = "Invalid user name.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include letters, numbers, and symbols.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $conn = new mysqli("localhost", "root", "", "galaxy_academy");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $emailSafe = $conn->real_escape_string($email);
        $checkUser = $conn->query("SELECT id FROM users WHERE email = '$emailSafe'");

        if ($checkUser->num_rows > 0) {
            $errors[] = "Email already registered.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username,  $email, $hashedPassword);

            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                header("Location: profile.php");
                exit();
            } else {
                $errors[] = "Signup failed. Please try again.";
            }
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/Signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
</head>

<body>
    <br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="signup-container">
                    <h2 class="text-center mb-4">Create Your Account</h2>

                    <!-- Show Errors -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $err): ?>
                                    <li><?= $err ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="" novalidate>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required
                                pattern="^[a-zA-Z]{2,50}$" maxlength="50">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" required maxlength="100">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required
                                minlength="8" maxlength="100">
                            <div class="form-text">Use 8+ characters with letters, numbers & symbols</div>
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                                required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="termsCheck" required>
                            <label class="form-check-label" for="termsCheck">I agree to the terms</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Create Account</button>

                        <div class="text-center mt-3">
                            <span>Already have an account? <a href="../authentication/login.php">Log in</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>