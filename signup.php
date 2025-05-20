<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php'; 
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hshdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST["email"];

    // Check if passwords match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Passwords do not match!";
    } else {
        // Check if the email is already registered
        $stmt = $conn->prepare("SELECT * FROM account WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    }
        if ($result->num_rows > 0) {
            echo '<div class="error-message">This email is already registered. Please use another email.</div>';
        } else {

                    // Check if the email is already registered
        $stmt = $conn->prepare("SELECT * FROM account WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="error-message">This username is already registered. Please use another username.</div>';
        } else {

            // Email is not registered, proceed with verification process
            $verification_token = bin2hex(random_bytes(16)); // 32-character token
            $otp_code = rand(100000, 999999); // Generate a 6-digit OTP code
            $otp_expiry = time() + (5 * 60); // OTP expires in 5 minutes

            // Send verification email
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP(); 
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true; 
                $mail->Username   = 'homesweephomeph@gmail.com'; 
                $mail->Password   = 'rqzn ebut wdck yohp';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                // Recipients
                $mail->setFrom('homesweephomeph@gmail.com', 'Home Sweep Home');
                $mail->addAddress($email);
                $mail->addReplyTo('homesweephomeph@gmail.comm', 'Home Sweep Home');

                // Content
                $mail->isHTML(true);  
                $mail->Subject = 'Verification Code';
                $mail->Body    = 'Please enter the following OTP code to verify your email: <b>' . $otp_code . '</b>'; 

                $mail->send();
                echo 'Verification email has been sent. Please check your inbox.';

                // Temporarily store data in the session until verification
                $_SESSION['name'] = $name;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['email'] = $email;
                $_SESSION['verification_token'] = $verification_token;
                $_SESSION['otp_code'] = $otp_code;
                $_SESSION['otp_expiry'] = $otp_expiry;

                // Redirect to verification page
                header("Location: verify.php?token=" . $verification_token);
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('Signup.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }
        .mcon {
            margin-top: 5%;
            max-width: fit-content;
            margin-inline: auto;
            max-width: 400px;
            padding: 10px;
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
            font-size: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            margin-top: 20px;
            padding-left: 45px;
        }
        .form-control {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border-radius: 1px;
            border: 1px solid #ccc;
        }
        .btn-primary {
            display: block;
            width: 60%;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
            margin-left: 80px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            border: 1px solid white;
            border-radius: 3px;
            background: transparent;
        }
        .input-group-text {
            color: white;
        }
       #username::placeholder, #password::placeholder, #email::placeholder, #confirm_password::placeholder {
           color: #333;
           font-size: 12px;
       }
        p {
            text-align: center;
        }
        .no-decoration {
            text-decoration: none;
        }
        .password-wrapper {
            position: relative;
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
    padding: 0;
    margin: 0;
}
    .error-message {
        color: #ff4d4d; /* Red color for error */
        font-size: 16px; /* Adjust font size */
        background-color: #ffe6e6; /* Light red background */
        border: 1px solid #ff4d4d; /* Red border */
        padding: 10px; /* Some padding around the text */
        border-radius: 5px; /* Rounded corners */
        margin-top: 20px; /* Add spacing from elements above */
        margin-left: 580px;
        width: fit-content; /* Adjust width based on content */
    }
    </style>
</head>
<body>
    <div class="mcon">
        <div class="container">
            <h2>Sign Up</h2>

            <div id="error-message" style="color: red; text-align: center;"></div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <!-- FullName Field -->
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" id="username" name="name" placeholder="Enter Fullname" required
               oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
      </div>
    </div>

         <!-- Username Field -->
         <div class="form-group">
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
        </div>
    </div>

 <!-- Password Field with Eye Toggle -->
<div class="form-group password-wrapper">
    <div class="input-group">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required 
               pattern="^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$" title="Password must be at least 8 characters long and include letters, numbers, and special characters">
        <button type="button" id="togglePassword" class="eye-button">
            <i class="fas fa-eye" id="eyeIcon"></i>
        </button>
    </div>
</div>

<!-- Confirm Password Field with Eye Toggle -->
<div class="form-group password-wrapper">
    <div class="input-group">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="button" id="toggleConfirmPassword" class="eye-button">
            <i class="fas fa-eye" id="confirmEyeIcon"></i>
        </button>
    </div>
</div>

    <!-- Email Field -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-primary">Sign Up</button>

    <!-- Redirect to Login -->
    <p>Already have an account? <a href='Login.php' class='no-decoration'>Log in now</a></p>
</form>
        </div>
    </div>



    
    <script>
        document.querySelector('form').onsubmit = function(event){
    let password = document.querySelector('#password').value;
    let confirm_password = document.querySelector('#confirm_password').value;
    let errorMessage = document.querySelector('#error-message');
    errorMessage.innerHTML = ''; // Clear previous errors

    if(password !== confirm_password) {
        event.preventDefault(); // Prevent form submission
        errorMessage.innerHTML = 'Passwords do not match';
    }
}
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle for password field
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const eyeIcon = document.querySelector("#eyeIcon");

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        eyeIcon.classList.toggle("fa-eye-slash");
    });

    // Toggle for confirm password field
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const confirmPassword = document.querySelector("#confirm_password");
    const confirmEyeIcon = document.querySelector("#confirmEyeIcon");

    toggleConfirmPassword.addEventListener("click", function () {
        const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
        confirmPassword.setAttribute("type", type);
        confirmEyeIcon.classList.toggle("fa-eye-slash");
    });
});
</script>




</body>
</html>
