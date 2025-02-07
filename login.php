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
$error_message = '';  // Initialize error message variable

// Retain the email value after failed login
$email_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Retain the email entered by the user
    $email_value = $email;

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['email'] = $email;

        // Redirect user to home page after login
        header("Location: index.php");
        exit();
    } else {
        // Set the error message if login fails
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="POST">
    <link rel="stylesheet" href="styles.css">
    <div class="login-container">
        <h2>Login</h2>
        <!-- Retain email value in case of error -->
        <input type="email" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($email_value); ?>" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>

        <!-- Show error message if login fails -->
        <?php if (!empty($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>

        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</form>