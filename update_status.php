<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$booking_id = $_POST['booking_id'];
$status = $_POST['status'];
$decline_reason = $_POST['decline_reason'] ?? null;

// Update status in the status table
$sql = "UPDATE status 
        SET status = ?, decline_reason = ?
        WHERE booking_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $status, $decline_reason, $booking_id);

if ($stmt->execute()) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>