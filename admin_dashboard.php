<?php 
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
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

// Fetch all bookings with status
$bookings_sql = "SELECT bookings.id AS booking_id, bookings.first_name, bookings.last_name, bookings.email, 
                        bookings.photoshoot_date, bookings.photoshoot_type, 
                        bookings.photoshoot_package, bookings.services, bookings.price, 
                        status.status, status.decline_reason 
                 FROM bookings 
                 LEFT JOIN status ON bookings.id = status.booking_id 
                 ORDER BY bookings.photoshoot_date DESC";
$bookings_result = $conn->query($bookings_sql);

// Fetch all inquiries
$inquiries_sql = "SELECT * FROM inquiries ORDER BY created_at DESC";
$inquiries_result = $conn->query($inquiries_sql);

// Handle inquiry reply submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reply_message'])) {
    $inquiry_id = $_POST['inquiry_id'];
    $admin_id = $_SESSION['admin_id'];
    $reply_message = $_POST['reply_message'];

    $stmt = $conn->prepare("INSERT INTO inquiry_replies (inquiry_id, admin_id, reply_message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $inquiry_id, $admin_id, $reply_message);

    if ($stmt->execute()) {
        $success_message = "Reply submitted successfully!";
    } else {
        $error_message = "Failed to submit reply.";
    }

    $stmt->close();
}
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
  <style>
    .dashboard-container {
      max-width: 1200px;
      margin: 50px auto;
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
  </style>
</head>
<body>
  <div class="container">
    <div class="navbar">
      <div class="logo">
        <img src="images/log.png" width="125px">
      </div>
      <nav>
        <ul id="MenuItems">
          <?php if (isset($_SESSION['admin_id'])) { ?>
            <li class="dropdown">
              <a href="#">Account</a>
              <ul class="dropdown-menu">
                <li><a href="admin_dashboard.php">Booking Status</a></li>
                <li><a href="admin_login.php">Log Out</a></li>
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

  <div class="dashboard-container">
    <h2>Welcome, Admin <?php echo $_SESSION['admin_username']; ?>!</h2>

    <!-- Bookings Section -->
    <h3>All Bookings</h3>
    <?php if ($bookings_result->num_rows > 0) { ?>
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
            <th>Services</th>
            <th>Price</th>
            <th>Status</th>
            <th>Decline Reason</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $bookings_result->fetch_assoc()) { ?>
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
              <td>
                <form class="update-status-form" method="POST" action="update_status.php">
                  <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                  <select name="status" required>
                    <option value="pending" <?php echo $status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="accepted" <?php echo $status == 'accepted' ? 'selected' : ''; ?>>Accepted</option>
                    <option value="declined" <?php echo $status == 'declined' ? 'selected' : ''; ?>>Declined</option>
                  </select>
                  <input type="text" name="decline_reason" placeholder="Decline Reason (if any)">
                  <button type="submit">Update</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>No bookings found.</p>
    <?php } ?>

    <!-- Inquiries Section -->
    <h3>All Inquiries</h3>
    <?php if ($inquiries_result->num_rows > 0) { ?>
      <table class="inquiry-table">
        <thead>
          <tr>
            <th>Inquiry ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($inquiry = $inquiries_result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $inquiry['id']; ?></td>
              <td><?php echo $inquiry['full_name']; ?></td>
              <td><?php echo $inquiry['email']; ?></td>
              <td><?php echo $inquiry['subject']; ?></td>
              <td><?php echo $inquiry['message']; ?></td>
              <td><?php echo $inquiry['created_at']; ?></td>
              <td>
                <form class="reply-form" method="POST" action="">
                  <input type="hidden" name="inquiry_id" value="<?php echo $inquiry['id']; ?>">
                  <textarea name="reply_message" rows="3" placeholder="Enter your reply" required></textarea>
                  <button type="submit">Reply</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>No inquiries found.</p>
    <?php } ?>
  </div>
</body>
</html>

<?php
$conn->close();
?>