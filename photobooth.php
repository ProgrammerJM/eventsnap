<?php
session_start(); // Start the session to check login status
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Events Coverage | EventSnap</title>
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
          <li><a href="contactus.php">Contact Us</a></li>
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

    <!-- Photobooth Section -->
    <div class="coverage-container">
        <div class="coverage-description">
          <h1>Photobooth</h1>
          <p>
            Add excitement to your event with our interactive photobooth experience! We provide high-quality photo keepsakes your guests will love, with a variety of customizable print options—choose from classic 4x6" prints, fun film strips, Polaroid-style snapshots, and even magnetic prints!
          </p>
          <p>
            Want to elevate the experience? Our sleek mirror booth offers a modern, interactive touch with a stylish design, personalized layouts, and an easy-to-use touchscreen mirror for the perfect poses.
          </p>
          <p>
            No matter the occasion, our photobooth services add a unique and engaging element that brings people together. Create memories, capture smiles, and let the fun unfold!
          </p>
          <a href="packages.php" class="btn-packages">Packages</a>
      <!-- Dynamic "Book Us" Button -->
      <a href="<?php echo (isset($_SESSION['user_id'])) ? 'booking.php' : 'login.php'; ?>" class="btn-packages">Book Us</a>
    </div>

    <div class="image-section">
        <img src="image.gif" alt="Photobooth GIF">
    </div>

  <script>
    // Toggle menu for mobile view
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
      } else {
        MenuItems.style.maxHeight = "0px";
      }
    }
  </script>

</body>
</html>