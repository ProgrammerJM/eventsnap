<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    header("Location: booking.php"); // Redirect to the booking page
} else {
    header("Location: login.php"); // Redirect to the login page
}
exit();
?>
