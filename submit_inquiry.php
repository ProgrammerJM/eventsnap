<?php
header("Content-Type: application/json"); // Ensure the response is JSON

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}

function sanitize($data) {
    return htmlspecialchars(trim($data));
}

$full_name = sanitize($_POST['full_name']);
$company_name = isset($_POST['company_name']) ? sanitize($_POST['company_name']) : null;
$email = sanitize($_POST['email']);
$phone = sanitize($_POST['phone']);
$source = sanitize($_POST['source']);
$subject = sanitize($_POST['subject']);
$message = sanitize($_POST['message']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid email address."]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO inquiries (full_name, company_name, email, phone, source, subject, message, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("sssssss", $full_name, $company_name, $email, $phone, $source, $subject, $message);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Inquiry submitted successfully!";
    header("Location: dashboard.php"); // Redirect to the dashboard after successful submission
    exit();
} else {
    $_SESSION['error_message'] = "Failed to submit inquiry.";
    header("Location: inquiry.php"); // Redirect back to the inquiry form on error
    exit();
}

$stmt->close();
$conn->close();
?>