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

          <!---------FAQ --------->
    <section class="faq-page-area pt-70 pb-85 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Frequently Asked Questions</h2>

                        </div>
                        <div class="accordion-one" id="faq-accordion">
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                       1. What services do you offer?
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>Photography for events, corporate, product, and more.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        2. How do I book?
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>You can book to our package through our website, by calling our customer service, or by visiting our office. Our representatives will assist you in selecting the best options based on your preferences.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        3. What types of events do you offer?
                                    </button>
                                </h5>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>Any events that has your precious memories.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                        4. Can I customize my package?
                                    </button>
                                </h5>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>Yes you can just coordinate with our team with your preferred style and we will make it happen.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                        5. Are your tours suitable any time?
                                    </button>
                                </h5>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>As long as we are available will make it happen for you.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                        6. What payment methods do you accept?
                                    </button>
                                </h5>
                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>Cash , Credit Card, and Bank Transfer.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                                        7. Is a deposit required when booking?
                                    </button>
                                </h5>
                                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>Yes to ensure your booking we require a deposit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                                        8. Can I make changes to my booking after it has been confirmed?
                                    </button>
                                </h5>
                                <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>It will depend on the contract that has been sign between two parties.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNine">
                                        9. What is your cancellation policy?
                                    </button>
                                </h5>
                                <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>We understand that plans can change, so we aim to be as flexible as possible. However, our cancellation policy is as follows:

More than 30 days before the scheduled shoot : Full refund of any deposit paid.
15–30 days before the scheduled shoot : 50% of the deposit will be refunded.
Less than 15 days before the scheduled shoot : No refunds will be issued, as we reserve the date exclusively for you.
If you need to reschedule, please contact us at least 14 days in advance, and we’ll do our best to accommodate your request.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTen">
                                        10. How do I know if my event is confirmed?
                                    </button>
                                </h5>
                                <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>We will send you a confirmation email, message once your booking has been confirmed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
<!-- <!end---------->




<!-- Contact Form Area start -->
<section class="contact-form-area py-70 rel z-1">
            <div class="container contact-container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="comment-form bgc-lighter z-1 rel mb-30 rmb-55">
                            <form id="contactForm" class="contactForm" name="contactForm" method="post" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <div class="section-title">
                                    <h2>Get In Touch</h2>
                                </div>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <div class="row mt-35">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Juan De la Cruz" value="" required data-error="Please enter your Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone" value="" required data-error="Please enter your Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter  email" value="" required data-error="Please enter your Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
    <div class="form-group">
        <label for="message">Your Message</label>
        <textarea name="message" id="message" class="form-control fixed-textarea" rows="5" placeholder="Message" required data-error="Please enter your Message"></textarea>
        <div class="help-block with-errors"></div>
    </div>
</div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                           <ul class="radio-filter mb-25">
                                                <li>
                                                    <input class="form-check-input" type="radio" name="terms-condition" id="terms-condition">
                                                    <label for="terms-condition">Save my name, email, and website in this browser for the next time I comment.</label>
                                                </li>
                                            </ul>
                                            <button type="submit" class="theme-btn style-two">
                                                <span data-hover="Send Comments">Send Comments</span>
                                                <i class="fal fa-arrow-right"></i>
                                            </button>
                                            <div id="msgSubmit" class="hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
          </div>
    </div>
</div>
                    
        <!-- Contact Form Area end -->

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