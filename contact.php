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
      <img src="images/menu.png" class="menu-icon" id="menuButton" onclick="menutoggle()"/>
    </div>
  </div>
      
      <!-- Contact Section -->
      <div class="contact-container">
        <iframe
            class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.9265060911743!2d121.0840213!3d14.5866445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7c123456789%3A0x1234567890abcdef!2sLittle%20Tootsy%20Photography%20Studio!5e0!3m2!1sen!2sph!4v1680000000000"
            width="100%"
            height="400"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>

        <!-- Information Section -->
        <div class="info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong><br>Manila, Philippines</p>
            <p><strong>Nearest Landmark:</strong><br>PUP - College of Engineering and Architecture</p>
            <p><strong>Searchable on Waze:</strong><br>EventSnap Photography Studio</p>
            <p><strong>Searchable on Google Maps:</strong><br>EventSnap Photography Studio</p>
            <p><strong>Contact #:</strong><br>0912-345-6789 (SMART)</p>
            <p><strong>Operating Hours:</strong><br>Tuesday to Sunday, 10 AM to 5 PM</p>
            <a href="https://m.me/eventsnapps" target="_blank">
              <button class="contact-button">Message Us</button>
            </a>            
            <div class="socials">
              <a href="https://www.facebook.com/eventsnapps" target="_blank"><img src="images/instagram-icon.png" alt="Instagram"></a>
              <a href="https://www.facebook.com/eventsnapps" target="_blank"><img src="images/facebook-icon.png" alt="Facebook"></a>
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


