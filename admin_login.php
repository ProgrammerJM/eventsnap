<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message variable
$error_message = '';  // Initialize error message variable

// Retain the username value after failed login
$username_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Retain the username entered by the admin
    $username_value = $username;

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, username, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $db_password)) {
        // Login successful
        $_SESSION['admin_id'] = $id;
        $_SESSION['admin_username'] = $db_username;

        // Redirect to admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Set the error message if login fails
        $error_message = "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | EventSnap</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .login-container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .login-container h2 {
      margin-bottom: 20px;
    }
    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-container button:hover {
      background-color: #45a049;
    }
    .error-message {
      color: red;
      margin-top: 10px;
    }
    .login-container p {
      margin-top: 15px;
    }
    .login-container a {
      color: #4caf50;
      text-decoration: none;
    }
    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form method="POST">
      <!-- Retain username value in case of error -->
      <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username_value); ?>" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>

      <!-- Show error message if login fails -->
      <?php if (!empty($error_message)) { ?>
        <p class="error-message"><?php echo $error_message; ?></p>
      <?php } ?>

      <p>Don't have an account? <a href="admin_register.php">Register</a></p>
    </form>
  </div>
</body>
</html>