<?php
include "validation.php";
session_start();

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if (empty($username) || empty($password)) {
        $error = "Please enter both username/email and password.";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // ✅ If password is stored as plain text (not recommended)
            // if ($user['password'] === $password) {

            // ✅ If password is hashed, use password_verify (recommended)
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user['username'];
                $success = "Login successful! Redirecting...";
                header("Location: ../admindashboard/admin.php"); exit;
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No user found with that username or email.";
        }


    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login - Galaxy Academy</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../images/logo.png" type="image/png">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4">
                <h2 class="card-title text-center mb-4">Login</h2>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php elseif (!empty($success)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>

                <form id="loginForm" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter email or username" required>
                        <div class="invalid-feedback">
                            Please enter your email or username.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <button class="btn btn-outline-primary rounded-1" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                            <div class="invalid-feedback">
                                Please enter your password.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Log In</button>

                    <div class="text-center">
                        <a href="#" class="text-decoration-none">Forgot password?</a>
                        <p class="mt-2">Don't have an account?
                            <a href="Signup.php" class="text-decoration-none">Sign up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });

        // Bootstrap validation
        (() => {
            'use strict';
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>