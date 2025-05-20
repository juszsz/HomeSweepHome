<?php
session_start();
include("db_connect.php");
include("function.php");
$error_message = "";

// Initialize the attempts counter if not set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Check if "Remember Me" cookies exist
if (isset($_COOKIE['remember_username']) && isset($_COOKIE['remember_token'])) {
    $username = $_COOKIE['remember_username'];
    $token = $_COOKIE['remember_token'];

    // Validate the token against the database
    if (checkRememberMeToken($username, $token)) {
        // Token is valid, log the user in
        $_SESSION['accountid'] = getUserIdByUsername($username); // Assuming getUserIdByUsername function exists
        header("Location: Index.php");
        exit();
    } else {
        // Token is invalid, handle accordingly
        $error_message = "Invalid session, please log in again.";
    }
}

// Function to update the "Remember Me" token in the database
function updateRememberMeToken($username, $token) {
    global $con;
    // Store the token in the database
    $sql = "UPDATE account SET remember_token = ? WHERE username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $token, $username);
    $stmt->execute();
    $stmt->close();
}

// Function to check the "Remember Me" token from the database
function checkRememberMeToken($username, $token) {
    global $con;
    // Fetch the token from the database
    $sql = "SELECT remember_token FROM account WHERE username = ? LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($db_token);
    $stmt->fetch();
    $stmt->close();
    return ($token === $db_token); // Check if tokens match
}

// Function to get user ID by username
function getUserIdByUsername($username) {
    global $con;
    
    // Prepare a SQL statement to get the user's ID from the account table
    $query = "SELECT accountid FROM account WHERE username = ? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['accountid']; // Return the user's accountid
    }
    
    return false; // If no user is found
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username and password are empty
    if (empty($username) || empty($password)) {
        $error_message = "Username and password are required";
    } else {
        // Check if the user is admin
        $stmt_admin = $con->prepare("SELECT * FROM master_control WHERE username = ? AND password = ? LIMIT 1");
        $stmt_admin->bind_param("ss", $username, $password);
        $stmt_admin->execute();
        $result_admin = $stmt_admin->get_result();

        // Check if the user is a regular user
        $query = "SELECT * FROM account WHERE username = ? LIMIT 1";
        $stmt_user = $con->prepare($query);
        $stmt_user->bind_param("s", $username);
        $stmt_user->execute();
        $result = $stmt_user->get_result();

        // Verify reCAPTCHA
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $secret = '6LdlSkEqAAAAAD8LsNDdrdgOCooourCT5jRnJ1mA'; // Replace with your actual secret key
            $response = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
            $responseKeys = json_decode(file_get_contents($verifyUrl . '?secret=' . $secret . '&response=' . $response . '&remoteip=' . $remoteIp), true);

            if ($responseKeys["success"]) {
                // Success: reCAPTCHA verified
                if ($result_admin->num_rows == 1) {
                    // Redirect to Admin.php if admin credentials are correct
                    header("Location: Admin.php");
                    exit();
                } elseif ($result && $result->num_rows > 0) {
                    $user_data = $result->fetch_assoc();

                    // Password verification (assuming you store hashed passwords)
                    if (password_verify($password, $user_data['password'])) {
                        $_SESSION['accountid'] = $user_data['accountid'];

                  // Check if "Remember Me" is checked
                   if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
                  // Generate a unique token for the user
                   $token = bin2hex(random_bytes(16)); // Generates a secure random token
                  // Store the token in the database, tied to the user account
                  // Assuming you have a function updateRememberMeToken($username, $token)
                    updateRememberMeToken($username, $token);
    
                  // Set cookies with username and token
                    setcookie('remember_username', $username, time() + (86400 * 30), "/");
                    setcookie('remember_token', $token, time() + (86400 * 30), "/");
                  } else {
                 // Clear cookies if "Remember Me" is not checked
                 setcookie('remember_username', '', time() - 3600, "/");
                 setcookie('remember_token', '', time() - 3600, "/");
                  }

                        // Redirect to Index.php if regular user credentials are correct
                        header("Location: Index.php");
                        exit();
                    } else {
                        // Increment the attempts counter
                        $_SESSION['login_attempts']++;
                        $error_message = "Incorrect username or password.";
                    }
                } else {
                    // Increment the attempts counter
                    $_SESSION['login_attempts']++;
                    $error_message = "Incorrect username or password.";
                }
            } else {
                $error_message = "reCAPTCHA verification failed. Please try again.";
            }
        } else {
            $error_message = "Please complete the reCAPTCHA challenge.";
        }

        $stmt_admin->close();
        $stmt_user->close();
    }
}

// Check if the user has reached the maximum attempts
$max_attempts = 3;
$show_forgot_password = $_SESSION['login_attempts'] >= $max_attempts;

$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME SWEEP HOME</title>
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url('Login.jpg');
            background-repeat: no-repeat;
            background-size: 100%, 100%;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: absolute;
            width: 95%;
            top: 5px;
        }
        .container {
            display: flex;
            height: 80%;
            width: 55%;
            justify-content: center;
            box-shadow: 1px 1px 2px;
            border-radius: 5px;
        }
        .loginform {
            display: flex;
            flex-direction: column;
            background-color: rgba(250, 250, 250, 0.5);
            width: 90%;
            align-items: center;
            padding: 20px;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }
        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid;
            border-radius: 3px;
            background: transparent;
        }
        input[type="submit"], input[type="button"] {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            margin-top: 22px;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background: #0056b3;
        }
        label {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }
        .content {
            justify-content: center;
            align-items: center;
            padding-top: 10%;
            padding-left: 1%;
            text-align: left;
            color: white;
        }
        h1 {
            font-size: 50px;
            margin-bottom: 1%;
        }
        h3 {
            padding: 0;
            text-shadow: 2px 2px 4px #000000;
            margin: 0;
        }
        span {
            background: linear-gradient(45deg, #ff0000, #00ff00, #0000ff);
            background-clip: text;
            -webkit-background-clip: text;
            display: inline-block;
            color: transparent;
            background-size: 200% 200%;
            animation: colorShift 5s infinite linear;
        }
        @keyframes colorShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        b {
            color: gray;
            font-size: 30px;
        }
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 1px;
        }
        #username::placeholder, #password::placeholder {
            color: #333;
            font-size: 12px;
        }
        .no-decoration {
            text-decoration: none;
        }

        .password-wrapper {
         position: relative;
         display: flex;
         align-items: center;
        }

        .eye-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #333; /* Adjust color as needed */
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="loginform">
            <h2>LOGIN</h2>
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" placeholder="Enter Username" required>

    <label for="password">Password:</label>
    <div class="password-wrapper">
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <button type="button" id="togglePassword" class="eye-button">
            <i class="fa fa-eye"></i> <!-- This can be any icon or text -->
        </button>
    </div>

    <input type="checkbox" name="remember" id="remember">
    <label for="remember">Remember Me</label>
    <br><br>

    <!-- reCAPTCHA widget -->
    <div class="g-recaptcha" data-sitekey="6LdlSkEqAAAAAB9YMW7wn9K2_6MOCdkmrskOk39s"></div>

    <input type="submit" value="Login">

    <p>Don't have an account? <a href='signup.php' class='no-decoration'>Register now</a></p>

    <?php if ($show_forgot_password): ?>
            <p><a href="forgotpass.php" class="forgot-password-button">Forgot Password?</a></p>
    <?php endif; ?>

</form> 

            <div class="error-message"><?php echo $error_message; ?></div>
        </div>

        <div class="content">
            <h1>Welcome to <span>HOME SWEEP HOME</span></h1>
            <b>cleaning services!</b>
            <h3>Sweeping way to elegance</h3>
        </div>
    </div>
    
    <script>
// JavaScript for toggling password visibility
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // Toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // Toggle the icon (optional if using an icon)
        this.classList.toggle("fa-eye-slash");
    });
});
</script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>
</html>