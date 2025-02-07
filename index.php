<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | EventSnap</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>

<div class="header">
  <div class="container">
    <div class="navbar">
      <div class="logo">
        <a href="index.php">
          <img src="images/log.png" class="logo-img">
        </a>
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
      <img src="images/menu.png" class="menu-icon" id="menuButton" onclick="menutoggle()"/>
    </div>

    <div class="hero-container">
      <div class="col-2">
        <h1 class="hero-title">Transforming memories into everlasting masterpieces</h1>
        <p class="hero-tagline">"Preserving Moments, Creating Timeless Art"</p>
      </div>

      <div class="col-2">
        <img src="images/image1.png">
      </div>
    </div>
  </div>
</div>

<!----------------------->
<div class="categories  p-xl-5">
    <div class="small-container">
      <div class="row arts">
        <div class="col-3">
          <img src="images/category-1.png.png">
        </div>
        <div class="col-3">
          <img src="images/category-2.png.png">
        </div>
        <div class="col-3">
          <img src="images/category-3.png.png">
        </div>
      </div>
    </div>
</div>

<!-------------------->
  <div class="small-container">
    <h2 class="title">SERVICES WE OFFER</h2>
    <div class="row">
      <div class="col-4">
        <img src="images/eventcoverage1.png">
        <h4>Events Coverage</h4>
        <P>"Your moments, our lens."</P>
      </div>

      <div class="col-4">
        <img src="images/photobooth1.png">
        <h4>Photobooth</h4>
        <P>"Strike a pose"</P>
      </div>

      <div class="col-4">
        <img src="images/corporate1.png">
        <h4>Corporate Photography</h4>
        <P>"Professionalism in Focus"</P>
      </div>

      <div class="col-4">
        <img src="images/product1.png">
        <h4>Product Photography</h4>
        <P>"Capture. Highlight. Sell."</P>
      </div>
    </div>
  </div>

<!---------- Footer --------------->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>DEVELOPERS</h3>
            <p>Arceta, Emmanuel <br> Perlas, John Rovick <br> Bedaño, Vanessa Anne <br> Ramos, John Patrick</p>
            <div class="app-logo">
            </div>
          </div>
          <div class="footer-col-2">
          </div>
          <div class="footer-col-3">
          </div>
          <div class="footer-col-3">
          </div>
        </div>
        <hr>
        <p class="copyright">WEB AND MOBILE SYSTEMS</p>
      </div>
    </div>

    <!-------toggle----------->
    <script>
  var menu = document.getElementById("MenuItems"); // The dropdown menu
  var menuButton = document.getElementById("menuButton"); // The hamburger button

  function menutoggle() {
    menu.classList.toggle("show"); // Toggle the menu visibility
  }

  // Close menu when clicking outside
  document.addEventListener("click", function (event) {
    if (menu.classList.contains("show") && !menu.contains(event.target) && !menuButton.contains(event.target)) {
      menu.classList.remove("show"); // Hide the menu
    }
  });
</script>
</body>
</html>
