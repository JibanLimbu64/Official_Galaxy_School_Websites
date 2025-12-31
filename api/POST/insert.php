<?php
require_once "../../config/database.php"; // $conn
require_once "../utilities/response.php"; // JsonResponse class

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Validate HTTP Method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    JsonResponse::send('fail', 'Invalid request method. Use POST.');
}

$action = $_POST['action'] ?? null;

try {
    if ($action === "admit_students") {
        // ✅ Validate required fields
        $requiredFields = ['name', 'dob', 'gender', 'caddress', 'paddress', 'fname', 'mname', 'class'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                JsonResponse::send("fail", "Missing required field: $field");
            }
        }

        // ✅ Prepare INSERT query
        $stmt = $conn->prepare("
            INSERT INTO admissions (
                application_date, status, name, dob, gender,
                caddress, paddress, fname, mname, class
            ) VALUES (
                NOW(), 'pending', ?, ?, ?, ?, ?, ?, ?, ?
            )
        ");

        if (!$stmt) {
            JsonResponse::send("fail", "Prepare failed: " . $conn->error);
        }

        // ✅ Assign variables first (required for bind_param)
        $name      = $_POST['name'];
        $dob       = $_POST['dob'];
        $gender    = $_POST['gender'];
        $caddress  = $_POST['caddress'];
        $paddress  = $_POST['paddress'];
        $fname     = $_POST['fname'];
        $mname     = (int) $_POST['mname'];
        $class     = $_POST['class'];

        // ✅ Bind parameters (use exact type string for values)
        $stmt->bind_param(
            "ssssssss",
            $name, $dob, $gender, $caddress, $paddress,
            $fname, $mname, $class
        );

        // ✅ Execute query
        if ($stmt->execute()) {
            JsonResponse::send("success", "Admission form submitted successfully.");
        } else {
            JsonResponse::send("fail", "Insert failed: " . $stmt->error);
        }

        $stmt->close();
    } else {
        JsonResponse::send("fail", "Invalid or missing action.");
    }
} catch (Exception $e) {
    JsonResponse::send("error", "Exception occurred: " . $e->getMessage());
}

$conn->close();
