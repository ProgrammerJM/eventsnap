<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Services | EventSnap</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
  
  <div class="container">
    <div class="navbar">
      <div class="logo">
        <img src="images/log.png" width="125px">
      </div>
      <nav>
        <ul id="MenuItems">
          <li><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a href="services.php">Services</a>
            <ul class="dropdown-menu">
              <li><a href="events-coverage.php">Events Coverage</a></li>
              <li><a href="photobooth.php">Photobooth</a></li>
              <li><a href="corporate-photography.php">Corporate Photography</a></li>
              <li><a href="product-photography.php">Product Photography</a></li>
            </ul>
          </li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="faq.php">FAQ's</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <!-- Dynamic Login/Register or Account Dropdown -->
          <?php if (isset($_SESSION['user_id'])) { ?>
            <li class="dropdown">
              <a href="#">Account</a>
              <ul class="dropdown-menu">
                <li><a href="dashboard.php">Booking Status</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li><a href="redirect.php">Login/Register</a></li>
          <?php } ?>
        </ul>
      </nav>
      <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>

  <div class="small-container">

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Ensure the user is logged in
    $rating = $_POST['rating'];
    $testimonial_text = $_POST['testimonial_text'];

    // Insert into database
    $sql = "INSERT INTO testimonials (user_id, rating, testimonial_text, created_at, status) 
            VALUES (?, ?, ?, NOW(), 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $rating, $testimonial_text);

    if ($stmt->execute()) {
        echo "Thank you for your review! It will be displayed after approval.";
    } else {
        echo "Error submitting your review. Please try again.";
    }
}
?>


// Display testimonial

<?php
require 'db.php'; // Include your database connection file

$sql = "SELECT testimonials.*, users.username 
        FROM testimonials 
        JOIN users ON testimonials.user_id = users.id 
        WHERE status = 'approved' 
        ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="testimonial">';
        echo '<h4>' . htmlspecialchars($row['username']) . '</h4>';
        echo '<p>Rating: ' . str_repeat('⭐', $row['rating']) . '</p>';
        echo '<p>' . htmlspecialchars($row['testimonial_text']) . '</p>';
        echo '<small>' . date('F j, Y', strtotime($row['created_at'])) . '</small>';
        echo '</div>';
    }
} else {
    echo '<p>No testimonials yet. Be the first to leave a review!</p>';
}
?>

// Admin approval

<?php
session_start();
require 'db.php'; // Include your database connection file

// Fetch pending testimonials
$sql = "SELECT testimonials.*, users.username 
        FROM testimonials 
        JOIN users ON testimonials.user_id = users.id 
        WHERE status = 'pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="testimonial">';
        echo '<h4>' . htmlspecialchars($row['username']) . '</h4>';
        echo '<p>Rating: ' . str_repeat('⭐', $row['rating']) . '</p>';
        echo '<p>' . htmlspecialchars($row['testimonial_text']) . '</p>';
        echo '<small>' . date('F j, Y', strtotime($row['created_at'])) . '</small>';
        echo '<a href="approve_testimonial.php?id=' . $row['id'] . '">Approve</a>';
        echo '<a href="reject_testimonial.php?id=' . $row['id'] . '">Reject</a>';
        echo '</div>';
    }
} else {
    echo '<p>No pending testimonials.</p>';
}
?>

//Review Form 

<form action="submit_testimonial.php" method="POST">
    <label for="rating">Rating:</label>
    <select name="rating" id="rating" required>
        <option value="1">1 Star</option>
        <option value="2">2 Stars</option>
        <option value="3">3 Stars</option>
        <option value="4">4 Stars</option>
        <option value="5">5 Stars</option>
    </select>

    <label for="testimonial_text">Your Review:</label>
    <textarea name="testimonial_text" id="testimonial_text" rows="5" required></textarea>

    <button type="submit">Submit Review</button>
</form>

// Approve Reject

<?php
// approve_testimonial.php
session_start();
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE testimonials SET status = 'approved' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_dashboard.php"); // Redirect back to admin dashboard
}
?>

<?php
// reject_testimonial.php
session_start();
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_dashboard.php"); // Redirect back to admin dashboard
}
?>

    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle(){
        if(MenuItems.style.maxHeight=="0px")
          {
            MenuItems.style.maxHeight = "200px";
          }
        else
          {
            MenuItems.style.maxHeight = "0px";
          }
      }
    </script>


</body>
</html>