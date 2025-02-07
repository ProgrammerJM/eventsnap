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

  <!-- Inquiry Section -->
  <div class="inquiry-wrapper">
    <div class="inquiry-form-container">
      <h2>Inquiry Form</h2>
      <p>EventSnap Photography</p>
      <p>Mobile: +63912-345-6789</p>
      <p>Email: eventsnapps@gmail.com</p>
      <form class="inquiry-form" id="inquiryForm" action="submit_inquiry.php" method="POST">
        <label for="fullName">Full Name</label>
        <input type="text" id="fullName" name="full_name" placeholder="Enter your full name" required>
        
        <label for="companyName">Company Name</label>
        <input type="text" id="companyName" name="company_name" placeholder="Enter your company name (optional)">
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        
        <label for="source">How did you hear about us?</label>
        <select id="source" name="source" required>
          <option value="">Select an option</option>
          <option value="Social Media">Social Media</option>
          <option value="Website">Website</option>
          <option value="Referral">Referral</option>
          <option value="Other">Other</option>
        </select>
        
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Enter the subject of your inquiry" required>
        
        <label for="message">Message/Inquiry</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter your message or inquiry" required></textarea>
        
        <button type="submit">Send Inquiry</button>
      </form>
    </div>
  </div>

</body>
</html>