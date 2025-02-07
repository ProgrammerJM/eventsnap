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

<div class="small-container">
  
  <div class="row-2">
    <h1> Our Events</h1>
  </div>

  <div class= "package-group">
    <h2>Corporate Events</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/corp1.png">
    </div>
    <div class="col-4">
      <img src="images/corp2.png">
    </div>
    <div class="col-4">
      <img src="images/corp3.png">
    </div>
    <div class="col-4">
      <img src="images/corp4.png">
    </div>
  </div>
  <br>
  
  <div class= "package-group">
    <h2>Kiddie Party Events</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/kid1.png">
    </div>
    <div class="col-4">
      <img src="images/kid2.png">  
    </div>
    <div class="col-4">
      <img src="images/kid3.png"> 
    </div>
    <div class="col-4">
      <img src="images/kid4.png">
    </div>
  </div>
  <br>

  <div class= "package-group">
    <h2>Baptism</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/bab1.png">
    </div>
    <div class="col-4">
      <img src="images/bab2.png">
    </div>
    <div class="col-4">
      <img src="images/bab3.png">
    </div>
    <div class="col-4">
      <img src="images/bab4.png">
    </div>
  </div>
  <br>
  
  <div class= "package-group">
    <h2>Adult Birthday Party</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/adult1.png">
    </div>
    <div class="col-4">
      <img src="images/adult2.png">
    </div>
    <div class="col-4">
      <img src="images/adult3.png">
    </div>
    <div class="col-4">
      <img src="images/adult4.png">
    </div>
  </div>
  <br>
  
  <div class= "package-group">
    <h2>Debut</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/Debut1.png">
    </div>
    <div class="col-4">
      <img src="images/Debut2.png">
    </div>
    <div class="col-4">
      <img src="images/Debut3.png">
    </div>
    <div class="col-4">
      <img src="images/Debut4.png">
    </div>
  </div>
  <br>

  <div class= "package-group">
    <h2>Civil Wedding</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/Civ4.png">
    </div>
    <div class="col-4">
      <img src="images/Civ1.png">
    </div>
    <div class="col-4">
      <img src="images/Civ2.png">
    </div>
    <div class="col-4">
      <img src="images/Civ3.png">
    </div>
  </div>
  <br>
  
  <div class= "package-group">
    <h2>Wedding</h2>
  </div>
  <div class="row">
    <div class="col-4">
      <img src="images/Wed1.png">
    </div>
    <div class="col-4">
      <img src="images/Wed2.png">
    </div>
    <div class="col-4">
      <img src="images/Wed3.png">
    </div>
    <div class="col-4">
      <img src="images/Wed4.png">
    </div>
  </div>
</div>

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