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

    <!-- Packages Section -->
    <!-- CORPORATE -->
    <div class="packages-container">
        <div class="image-section">
            <img src="image.gif" alt="Corporate Event GIF">
        </div>
    <div class="packages-content"> 
        <h2>Corporate Events Packages</h2>
        <div class="package-group">
            <h3>PHOTO COVERAGE ONLY</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#1] Package 1:</strong> <br> • Full event photo coverage <br> • 1 photographer, 1 assistant <br> • Online gallery/cloud copy of all enhanced photos <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱5,000</strong> </div>
                <div class="package-item"><strong>[#2] Package 2:</strong> <br> • Full event photo coverage <br> • 2 photographers, 1 assistant <br> • Online gallery/cloud copy of all enhanced photos <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱10,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH MTV)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#3] Package 3:</strong> <br> • Full event photo and video coverage <br> • 1 photographer, 2 videographers, 1 assistant <br> • Online gallery/cloud copy of all enhanced photos <br> • 3-5 minute event highlights MTV <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱20,000</strong> </div>
                <div class="package-item"><strong>[#4] Package 4:</strong> <br> • Full event photo and video coverage <br> • 2 photographer, 2 videographers, 1 assistant <br> • Online gallery/cloud copy of all enhanced photos <br> • 3-5 minute event highlights MTV <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱30,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH SDE)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#5] Package 5:</strong> <br> • Full event photo and video coverage <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant <br> • Online gallery/cloud copy of all enhanced photos <br> • Same Day Edit (SDE) video <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱35,000</strong> </div>
                <div class="package-item"><strong>[#6] Package 6:</strong> <br> • Full event photo and video coverage <br> • 2 photographer, 3 videographers, 1 editor, 1 assistant <br> • Online gallery/cloud copy of all enhanced photos <br> • Same Day Edit (SDE) video <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱45,000</strong> </div>
            </div>
        </div>
    </div>
    </div>

    <!-- KIDDIE -->
    <div class="packages-container">
        <div class="image-section">
            <img src="image2.gif" alt="Kiddie Party and Baptism GIF">
        </div>
    <div class="packages-content">
        <h2>Kiddie Party and Baptism Packages</h2>
        <div class="package-group">
            <h3>PHOTO COVERAGE ONLY</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#7 / #13] Package 1:</strong> <br> • Full event photo coverage <br> • 1 photographer <br> • Online gallery/cloud copy of all enhanced photos <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱3,000</strong> </div>
                <div class="package-item"><strong>[#8 / #14] Package 2:</strong> <br> • Full event photo coverage <br> • 1 photographer <br> • Online gallery/cloud copy of all enhanced photos <br> • 50pcs 4r prints with box <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱5,000</strong> </div>
                <div class="package-item"><strong>[#9 / #15] Package 3:</strong> <br> • Full event photo coverage <br> • 1 photographer <br> • Online gallery/cloud copy of all enhanced photos <br> • Magazine type album (8x10, 20 pages, hardbound) <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱8,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH MTV)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#10 / #16] Package 4:</strong> <br> • Full event photo and video coverage <br> • 1 photographer, 1 videographer <br> • Online gallery/cloud copy of all enhanced photos <br> • 3-5 minute event highlights MTV <br> • Full length video <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱12,000</strong> </div>
                <div class="package-item"><strong>[#11 / #17] Package 5:</strong> <br> • Full event photo and video coverage <br> • 1 photographer, 1 videographer <br> • Online gallery/cloud copy of all enhanced photos <br> • 50pcs 4r prints with box <br> • 3-5 minute event highlights MTV <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱14,000</strong> </div>
                <div class="package-item"><strong>[#12 / #18] Package 6:</strong> <br> • Full event photo and video coverage <br> • 1 photographer, 1 videographer <br> • Online gallery/cloud copy of all enhanced photos <br> • Magazine type album (8x10, 20 pages, hardbound) <br> • Digital copy of album layout <br> • 3-5 minute event highlights MTV <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only) <br><br><strong>₱17,000</strong></div>
            </div>
        </div>
    </div>
    </div>

    <!-- ADULT -->
    <div class="packages-container">
        <div class="image-section">
            <img src="image3.gif" alt="Adult Birthday Party GIF">
        </div>
    <div class="packages-content">
        <h2>Adult Birthday Party Packages</h2>
        <div class="package-group">
            <h3>PHOTO COVERAGE ONLY</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#19] Package 1:</strong> <br> • Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱5,000</strong> </div>
                <div class="package-item"><strong>[#20] Package 2:</strong> <br> • Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱10,000</strong> </div>
                <div class="package-item"><strong>[#21] Package 3:</strong> <br> • Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱15,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH MTV)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#22] Package 4:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱25,000</strong> </div>
                <div class="package-item"><strong>[#23] Package 5:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱30,000</strong> </div>
                <div class="package-item"><strong>[#24] Package 6:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱35,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH SDE)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#25] Package 7:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱45,000</strong> </div>
                <div class="package-item"><strong>[#26] Package 8:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱50,000</strong> </div>
                <div class="package-item"><strong>[#27] Package 9:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video 
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱55,000</strong> </div>
            </div>
        </div>
    </div>
    </div>

    <!-- DEBUT -->
    <div class="packages-container">
        <div class="image-section">
            <img src="image4.gif" alt="Debut GIF">
        </div>
    <div class="packages-content">
        <h2>Debut Packages</h2>
        <div class="package-group">
            <h3>PHOTO COVERAGE ONLY</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#28] Package 1:</strong> <br> • Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱5,000</strong> </div>
                <div class="package-item"><strong>[#29] Package 2:</strong> Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱10,000</strong> </div>
                <div class="package-item"><strong>[#30] Package 3:</strong> Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱15,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH MTV)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#31] Package 4:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱25,000</strong> </div>
                <div class="package-item"><strong>[#32] Package 5:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱30,000</strong> </div>
                <div class="package-item"><strong>[#33] Package 6:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱35,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH SDE)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#34] Package 7:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱45,000</strong> </div>
                <div class="package-item"><strong>[#35] Package 8:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱50,000</strong> </div>
                <div class="package-item"><strong>[#36] Package 9:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video 
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱55,000</strong> </div>
            </div>
        </div>
    </div>
    </div>

    <!-- CIVIL WEDDING -->
    <div class="packages-container">
        <div class="image-section">
            <img src="image5.gif" alt="Civil Wedding GIF">
        </div>
    <div class="packages-content">
        <h2>Civil Wedding Packages</h2>
        <div class="package-group">
            <h3>PHOTO COVERAGE ONLY</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#37] Package 1:</strong> <br> • Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱5,000</strong> </div>
                <div class="package-item"><strong>[#38] Package 2:</strong> Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱10,000</strong> </div>
                <div class="package-item"><strong>[#39] Package 3:</strong> Full event photo coverage
                    <br> • 1 photographer, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱15,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH MTV)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#40] Package 4:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱25,000</strong> </div>
                <div class="package-item"><strong>[#41] Package 5:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱30,000</strong> </div>
                <div class="package-item"><strong>[#42] Package 6:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 2 videographers, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱35,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PHOTO AND VIDEO COVERAGE (WITH SDE)</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#43] Package 7:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱45,000</strong> </div>
                <div class="package-item"><strong>[#44] Package 8:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱50,000</strong> </div>
                <div class="package-item"><strong>[#45] Package 9:</strong> <br> • Full event photo and video coverage
                    <br> • 1 photographer, 3 videographers, 1 editor, 1 assistant
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video 
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱55,000</strong> </div>
            </div>
        </div>
    </div>
    </div>

    <!-- WEDDING -->
    <div class="packages-container">
        <div class="image-section">
            <img src="image6.gif" alt="Wedding GIF">
        </div>
    <div class="packages-content">
        <h2>Wedding Packages</h2>
        <div class="package-group">
            <h3>BASIC PACKAGES</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#46] Package A:</strong> <br> • Full event photo coverage
                    <br> • 2 photographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱10,000</strong> </div>
                <div class="package-item"><strong>[#47] Package B:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 2 videographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱15,000</strong> </div>
                <div class="package-item"><strong>[#48] Package C:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 3 videographers, 1 editor, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱20,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>CLASSIC PACKAGES</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#49] Package A:</strong> <br> • Full event photo coverage
                    <br> • 2 photographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱30,000</strong> </div>
                <div class="package-item"><strong>[#50] Package B:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 2 videographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱35,000</strong> </div>
                <div class="package-item"><strong>[#51] Package C:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 3 videographers, 1 editor, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • 50pcs 4r prints with box
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱40,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>STANDARD PACKAGES</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#52] Package A:</strong> <br> • Full event photo coverage
                    <br> • 2 photographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱50,000</strong> </div>
                <div class="package-item"><strong>[#53] Package B:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 2 videographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Digital copy of album layout
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱55,000</strong> </div>
                <div class="package-item"><strong>[#54] Package C:</strong> Full event photo and video coverage
                    <br> • 2 photographers, 3 videographers, 1 editor, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Magazine type album (8x10, 20 pages, hardbound)
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱60,000</strong> </div>
            </div>
        </div>
        <div class="package-group">
            <h3>PREMIUM PACKAGES</h3>
            <div class="package-list">
                <div class="package-item"><strong>[#55] Package A:</strong> <br> • Full event photo coverage
                    <br> • 2 photographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Standard Coffee table book album (10x10, 20 pages, leather bound)
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱70,000</strong></div>
                <div class="package-item"><strong>[#56] Package B:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 2 videographers, 1 assistant
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Standard Coffee table book album (10x10, 20 pages, leather bound)
                    <br> • Digital copy of album layout
                    <br> • 3-5 minute event highlights MTV
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱75,000</strong> </div>
                <div class="package-item"><strong>[#57] Package C:</strong> <br> • Full event photo and video coverage
                    <br> • 2 photographers, 3 videographers, 1 editor
                    <br> • USB copy of all enhanced photos
                    <br> • Online gallery/cloud copy of all enhanced photos
                    <br> • Standard Coffee table book album (10x10, 20 pages, leather bound)
                    <br> • Same Day Edit (SDE) video
                    <br> • Full length video
                    <br> • Transportation fees (*within Metro Manila only)
                    <br><br><strong>₱80,000</strong></div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
