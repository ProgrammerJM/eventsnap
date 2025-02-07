<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Form | EventSnap</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script defer src="script.js"></script>
</head>
<body>

  <div class="booking-container">
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
        </ul>
      </nav>
      <img src="images/menu.png" class="menu-icon" id="menuButton" onclick="menutoggle()">
    </div>
  </div>

  <!-- Booking Form -->
  <div class="booking-form-container">
   
  <div class="booking-inner-container">
    <?php
    if (isset($_GET['error'])) {
        echo '<p style="color: red;">Error: This date is already booked. Please select another date.</p>';
    }
    ?>

    <form id="bookingForm" action="submit_booking.php" method="POST"> <br>

    <h2>Booking Form</h2>
    <p>Book your professional photoshoot today!</p>
    <br>
    <h3>Personal Information</h3>
      <label for="first_name">First Name</label>
      <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>

      <label for="last_name">Last Name</label>
      <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email address" required>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" placeholder="PH Mobile Number" pattern="[0-9]{11}" required>
      
      <label for="address">Address</label>
      <input type="text" id="address" name="address" placeholder="Enter your address" required>
      <br><br>

      <h3>Service & Appointment Details</h3>
      <label for="photoshoot_date">Photoshoot Date</label>
      <input type="date" id="photoshoot_date" name="photoshoot_date" required>

      <label for="preferred_time">Preferred Time</label>
      <input type="time" id="preferred_time" name="preferred_time" required>

      <label for="photoshoot-type">Photoshoot Type</label>
      <select id="photoshoot-type" name="photoshoot_type" required>
          <option value="">Select a Photoshoot Type</option>
          <option value="corp">Corporate Events</option>
          <option value="kiddie">Kiddie Party</option>
          <option value="baptism">Baptism</option>
          <option value="adult">Adult Birthday Party</option>
          <option value="debut">Debut</option>
          <option value="civil">Civil Wedding</option>
          <option value="wedding">Wedding</option>
      </select>

      <label for="photoshoot-package">Photoshoot Package</label>
      <select id="photoshoot-package" name="photoshoot_package" required disabled>
          <option value="">Select a Package</option>
      </select>
      <br><br>

      <h3>Additional Information</h3>
      <label for="dream_photoshoot">Describe your dream photoshoot</label>
      <textarea id="dream_photoshoot" name="dream_photoshoot" placeholder="Describe your style, mood, or preferences"></textarea>

      <label>Other Services (Add-ons)</label>
<div class="checkbox-group">
  <input type="checkbox" name="services[]" value="photographers" data-price="1000"> Additional photographers (₱1000)
  <input type="checkbox" name="services[]" value="videographers" data-price="1500"> Additional videographers (₱1500)
  <input type="checkbox" name="services[]" value="usb" data-price="500"> USB copy (₱500)
  <input type="checkbox" name="services[]" value="aerial" data-price="2000"> Aerial video/drone (₱2000)
  <input type="checkbox" name="services[]" value="slideshow" data-price="700"> Photo slideshow AVP (₱700)
  <input type="checkbox" name="services[]" value="eventbooth" data-price="1500"> Event Photobooth (₱1500)
</div>

<!-- Display Total Price -->
<p>Total Price: ₱<span id="display_total_price">0</span></p>
<input type="hidden" id="total_price" name="total_price" value="0">

      <h3>Agreement</h3>
      <p>By proceeding, you agree to our <a href="privacy_terms.html">Privacy Policy and Terms & Conditions</a>.</p>
      <input type="checkbox" name="privacy_policy" required> I accept the Privacy Policy and Terms & Conditions

      <button type="submit">Confirm Booking</button>
    </form>
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

 <!-- BURGER NAV RESPONSIVENESS -->
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