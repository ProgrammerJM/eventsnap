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

  

  </div>
  <div class="small-container">
  <h2 class="title">Web Developers</h2>
</div>

<div class="teams">
  <div class="small-container">
    <div class="row">
      <div class="col-3">
        <i class="bi bi-person-fill"></i>
        <p>MInnovative Full-Stack Web Developer with expertise in designing, developing, and deploying scalable web applications.</p>
          <img src="images/emman.jpg">
          <h3>Arceta, Emmanuel</h3>
      </div>
      <div class="col-3">
        <i class="bi bi-person-fill"></i>        
        <p>Creative and detail-oriented Front-End Web Developer with a strong focus on crafting interactive and visually appealing user interfaces. Proficient in HTML, CSS, JavaScript, and frameworks like Vue.js and React. </p>
          <img src="images/van.jpg">
          <h3>Bedaño, Vannesa Anne</h3>
      </div>

      <div class="col-3">
        <i class="bi bi-person-fill"></i>
        <p>Skilled Back-End Web Developer specializing in building robust, scalable server-side applications. Proficient in Python, Node.js, and databases like PostgreSQL and MongoDB.</p>
          <img src="images/Rov.jpg">
          <h3>Perlas, John Rovick</h3>
      </div>
      <div class="col-3">
        <i class="bi bi-person-fill"></i>
        <p>Results-driven Web Developer with a passion for e-commerce solutions. Proficient in Shopify, WooCommerce, and custom web development using frameworks like Laravel. </p>
          <img src="images/pat.jpg">
          <h3>Ramos, John Patrick</h3>
      </div>
    </div>
  </div>
</div>



    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>Contact us</h3>
            <p>+639952334994 <br> emmanuel.arceta@gmail.com</p>
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
        <p class="copyright">WEB DEVELOPMENT</p>
      </div>
    </div>

    <!-------toggle----------->

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
    <!---------------------->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>DEVELOPERS</h3>
            <p>Arceta, Emmanuel <br> Perlas, John Rovick <br> Bedaño, Vanessa <br> Ramos, John Patrick</p>
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