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
$email_value = '';
$password_value = '';
$confirm_password_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Retain email value entered by user
    $email_value = $email;
    $password_value = $password;
    $confirm_password_value = $confirm_password;

    // Check if email already exists
    $checkUser = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkUser->bind_param("s", $email);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        // Set error message if email is already registered
        $error_message = "Email is already registered.";
        // Clear password fields only if email is already registered
        $password_value = '';  
        $confirm_password_value = '';
    } else {
        // Check if passwords match
        if ($password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } else {
            // Encrypt the password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into database
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $password_hash);

            if ($stmt->execute()) {
                $_SESSION['user_id'] = $stmt->insert_id; // Auto-login after registration
                $_SESSION['email'] = $email;

                // Set success message after successful registration
                $success_message = "Signup successful! You will be redirected to the login page.";

                // Redirect to login page after successful signup (using JavaScript)
                echo '<script type="text/javascript">
                        alert("'.$success_message.'");
                        window.location.href = "login.php";
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

<form method="POST">
    <link rel="stylesheet" href="styles.css">
    <div class="register-container">
        <h2>Register</h2>
        <!-- Retain email, password, and confirm_password values if there was an error -->
        <input type="email" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($email_value); ?>" required>
        <input type="password" name="password" placeholder="Enter Password" value="<?php echo htmlspecialchars($password_value); ?>" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo htmlspecialchars($confirm_password_value); ?>" required>
        <button type="submit">Register</button>

        <!-- Show error message if exists -->
        <?php if (!empty($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</form>
