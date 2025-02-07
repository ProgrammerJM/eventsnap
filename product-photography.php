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

    <!-- Corporate Section -->
    <div class="coverage-container">
        <div class="coverage-description">
          <h1>Product Photography</h1>
          <p>
            We specialize in high-quality product photography that captures the essence of your brand. Whether you're a large corporation or a small-to-medium business, our expert team is dedicated to highlighting your products in the best possible light. From stunning images for websites and menus to standout shots for e-commerce stores, we ensure every photograph not only showcases your products but also makes a lasting impact on your customers.
          </p>
          <p>
            Let us help you elevate your brand with visuals that connect and engage your target market.
          </p>
          <a href="<?php echo (isset($_SESSION['user_id'])) ? 'booking.php' : 'login.php'; ?>" class="btn-packages">Book Us</a>
        </div>
    </div>

    <div class="image-section">
        <img src="pb.gif" alt="Photobooth GIF">
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