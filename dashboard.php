<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking status for the logged-in user
$user_id = $_SESSION['user_id'];
$sql = "SELECT bookings.id AS booking_id, bookings.first_name, bookings.last_name, bookings.email, 
               bookings.photoshoot_date, bookings.photoshoot_type, 
               bookings.photoshoot_package, bookings.services, bookings.price, 
               status.status, status.decline_reason 
        FROM bookings 
        LEFT JOIN status ON bookings.id = status.booking_id 
        WHERE bookings.user_id = ? 
        ORDER BY bookings.photoshoot_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch inquiries and replies for the logged-in user
$user_email = $_SESSION['email'];
$inquiries_sql = "SELECT inquiries.*, inquiry_replies.reply_message, inquiry_replies.replied_at 
                  FROM inquiries 
                  LEFT JOIN inquiry_replies ON inquiries.id = inquiry_replies.inquiry_id 
                  WHERE inquiries.email = ? 
                  ORDER BY inquiries.created_at DESC";
$inquiries_stmt = $conn->prepare($inquiries_sql);
$inquiries_stmt->bind_param("s", $user_email);
$inquiries_stmt->execute();
$inquiries_result = $inquiries_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | EventSnap</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- <style>
    .dashboard-container {
      width: 100%;
      padding: 20px;
      background: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .dashboard-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .status-table, .inquiry-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    .status-table th, .status-table td, .inquiry-table th, .inquiry-table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    .status-table th, .inquiry-table th {
      background-color: #f2f2f2;
    }
    .status-table tr:hover, .inquiry-table tr:hover {
      background-color: #f5f5f5;
    }
    .status-pending {
      color: #ff9800;
    }
    .status-accepted {
      color: #4caf50;
    }
    .status-declined {
      color: #f44336;
    }
    .reply-message {
      margin-top: 10px;
      padding: 10px;
      background-color: #e9ecef;
      border-radius: 5px;
    }
  </style> -->
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
      <img src="images/menu.png" class="menu-icon" id="menuButton" onclick="menutoggle()">
    </div>
  </div>

  <!-- Dashboard Section -->
  <div class="dashboard-container">
    <h2>Welcome, <?php echo $_SESSION['email']; ?>!</h2>

    <!-- Booking Status Section -->
    <h3>Your Booking Status</h3>
    <?php if ($result->num_rows > 0) { ?>
      <table class="status-table">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Event Date</th>
            <th>Event Type</th>
            <th>Package</th>
            <th>Add-ons</th>
            <th>Price</th>
            <th>Status</th>
            <th>Decline Reason</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['booking_id']; ?></td>
              <td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['last_name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['photoshoot_date']; ?></td>
              <td><?php echo $row['photoshoot_type']; ?></td>
              <td><?php echo $row['photoshoot_package']; ?></td>
              <td><?php echo $row['services']; ?></td>
              <td>₱<?php echo number_format($row['price'], 2); ?></td>
              <td>
                <?php
                $status = $row['status'];
                $status_class = 'status-' . $status;
                echo "<span class='$status_class'>" . ucfirst($status) . "</span>";
                ?>
              </td>
              <td><?php echo $row['decline_reason'] ?? 'N/A'; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>No bookings found.</p>
    <?php } ?>

    <!-- Inquiries Section -->
    <h3>Your Inquiries</h3>
    <?php if ($inquiries_result->num_rows > 0) { ?>
      <table class="inquiry-table">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Reply</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($inquiry = $inquiries_result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $inquiry['subject']; ?></td>
              <td><?php echo $inquiry['message']; ?></td>
              <td><?php echo $inquiry['created_at']; ?></td>
              <td>
                <?php if ($inquiry['reply_message']) { ?>
                  <div class="reply-message">
                    <strong>Reply:</strong> <?php echo $inquiry['reply_message']; ?><br>
                    <small><?php echo $inquiry['replied_at']; ?></small>
                  </div>
                <?php } else { ?>
                  <div>No reply yet.</div>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>No inquiries found.</p>
    <?php } ?>
  </div>

  <!-- BURGER MENU -->
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

<?php
$stmt->close();
$inquiries_stmt->close();
$conn->close();
?>