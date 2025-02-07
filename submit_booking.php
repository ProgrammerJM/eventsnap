<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input data
function sanitize($data, $conn) {
    return $conn->real_escape_string($data);
}

// Collect form data
$photoshoot_date = sanitize($_POST['photoshoot_date'], $conn);
$preferred_time = sanitize($_POST['preferred_time'], $conn);
$photoshoot_type = sanitize($_POST['photoshoot_type'], $conn);
$photoshoot_package = isset($_POST['photoshoot_package']) ? sanitize($_POST['photoshoot_package'], $conn) : null;
$first_name = sanitize($_POST['first_name'], $conn);
$last_name = sanitize($_POST['last_name'], $conn);
$email = sanitize($_POST['email'], $conn);
$phone = sanitize($_POST['phone'], $conn);
$address = isset($_POST['address']) ? sanitize($_POST['address'], $conn) : null;
$dream_photoshoot = isset($_POST['dream_photoshoot']) ? sanitize($_POST['dream_photoshoot'], $conn) : null;
$services = isset($_POST['services']) ? implode(',', $_POST['services']) : '';
$total_price = isset($_POST['total_price']) ? sanitize($_POST['total_price'], $conn) : 0; // Get total price from hidden input

// Check if the date is already booked
$checkQuery = "SELECT COUNT(*) AS count FROM bookings WHERE photoshoot_date = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("s", $photoshoot_date);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    header("Location: booking.php?error=date_booked");
    exit();
}

// Insert data into the bookings table
$query = "INSERT INTO bookings (
    photoshoot_date, preferred_time, photoshoot_type, photoshoot_package,
    first_name, last_name, email, phone, address,
    dream_photoshoot, services, price, user_id
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param(
    "ssssssssssssi", 
    $photoshoot_date, $preferred_time, $photoshoot_type, $photoshoot_package,
    $first_name, $last_name, $email, $phone, $address,
    $dream_photoshoot, $services, $total_price, $_SESSION['user_id']
);

if ($stmt->execute()) {
    // Get the last inserted booking ID
    $booking_id = $stmt->insert_id;

    // Insert default status into the status table
    $statusQuery = "INSERT INTO status (user_id, booking_id, status) VALUES (?, ?, 'pending')";
    $statusStmt = $conn->prepare($statusQuery);
    $statusStmt->bind_param("ii", $_SESSION['user_id'], $booking_id);
    $statusStmt->execute();
    $statusStmt->close();

    header("Location: dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>