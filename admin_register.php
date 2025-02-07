<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eventsnap1';

// Connect to database
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message variable
$error_message = '';
$success_message = '';

// Retain input values after form submission
$username_value = '';
$password_value = '';
$confirm_password_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Retain username value entered by user
    $username_value = $username;
    $password_value = $password;
    $confirm_password_value = $confirm_password;

    // Check if username already exists
    $checkUser = $conn->prepare("SELECT id FROM admins WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        // Set error message if username is already registered
        $error_message = "Username is already registered.";
        // Clear password fields only if username is already registered
        $password_value = '';
        $confirm_password_value = '';
    } else {
        // Check if passwords match
        if ($password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } else {
            // Encrypt the password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert new admin into database
            $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password_hash);

            if ($stmt->execute()) {
                $_SESSION['admin_id'] = $stmt->insert_id; // Auto-login after registration
                $_SESSION['username'] = $username;

                // Set success message after successful registration
                $success_message = "Admin registration successful! You will be redirected to the login page.";

                // Redirect to login page after successful registration (using JavaScript)
                echo '<script type="text/javascript">
                        alert("' . $success_message . '");
                        window.location.href = "admin_login.php";
                      </script>';
                exit(); // Make sure to stop the script here to prevent further output
            } else {
                $error_message = "Error: " . $stmt->error; // Set error message on failed insert
            }

            $stmt->close();
        }
    }

    $checkUser->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration | EventSnap</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="register-container">
        <h2>Admin Registration</h2>
        <form method="POST">
            <!-- Retain username, password, and confirm_password values if there was an error -->
            <input type="text" name="username" placeholder="Enter Username" value="<?php echo htmlspecialchars($username_value); ?>" required>
            <input type="password" name="password" placeholder="Enter Password" value="<?php echo htmlspecialchars($password_value); ?>" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo htmlspecialchars($confirm_password_value); ?>" required>
            <button type="submit">Register</button>

            <!-- Show error message if exists -->
            <?php if (!empty($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>

            <p>Already have an account? <a href="admin_login.php">Login</a></p>
        </form>
    </div>
</body>
</html>