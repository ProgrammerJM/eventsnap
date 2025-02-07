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
        <img src="images/log.png" class="logo-img" alt="EventSnap Logo">
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
      <img src="images/menu.png" class="menu-icon" id="menuButton" onclick="menutoggle()" />
    </div>
  </div>

  <!-- Services Section -->
  <div class="services-container">
    <div class="services-description">
      <h1>Exceptional Event Photography and Multimedia Services</h1>
      <p>
        At EventSnap Photography and Multimedia, we provide a comprehensive suite of services to meet all your multimedia needs. Whether it’s capturing unforgettable moments at your event, creating engaging photo booth experiences, delivering polished corporate shoots, showcasing your products with professional photography, or providing expert video editing – we’ve got you covered.
      </p>
      <p>
        With a dedication to exceptional quality and personalized service, we ensure that your vision is brought to life with the highest level of skill and creativity. Trust EventSnap for multimedia solutions that make an impact.
      </p>
      <a href="inquiry.php" class="btn-inquire">INQUIRE NOW</a>
    </div>

    <div class="services-grid">
      <div class="service-item">
        <a href="events-coverage.php">
          <img src="images/eventcoverage1.png" alt="Events Coverage">
          <h3>Events Coverage</h3>
        </a>
      </div>
      <div class="service-item">
        <a href="photobooth.php">
          <img src="images/photobooth1.png" alt="Photobooth">
          <h3>Photobooth</h3>
        </a>
      </div>
      <div class="service-item">
        <a href="corporate-shoots.php">
          <img src="images/corporate1.png" alt="Corporate Shoots">
          <h3>Corporate Shoots</h3>
        </a>
      </div>
      <div class="service-item">
        <a href="product-photography.php">
          <img src="images/product1.png" alt="Product Photography">
          <h3>Product Photography</h3>
        </a>
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
</body>
</html>