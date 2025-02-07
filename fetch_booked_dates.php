<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Fetch booked dates
$query = "SELECT DISTINCT DATE(photoshoot_date) AS booked_date FROM bookings";
$result = $conn->query($query);

if (!$result) {
    die(json_encode(["error" => "Error executing query: " . $conn->error]));
}

// Store booked dates
$bookedDates = [];
while ($row = $result->fetch_assoc()) {
    $bookedDates[] = $row['booked_date'];
}

// Set JSON response
header('Content-Type: application/json');
echo json_encode($bookedDates);

$conn->close();
?>