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
$conn = new mysqli( $servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otp_code"])) {
    $otp_code = $_POST["otp_code"];
    $token = $_GET['token'];

    // Ensure that the session is active and contains user data
    if (!isset($_SESSION['verification_token']) || $token !== $_SESSION['verification_token']) {
        $error_message = "Invalid verification token.";
    } else {
        // Validate OTP code format (6-digit number)
        if (!preg_match('/^\d{6}$/', $otp_code)) {
            $error_message = "Invalid OTP format. Please enter a 6-digit code.";
        } elseif ($otp_code != $_SESSION['otp_code']) {
            // OTP does not match
            $error_message = "Invalid OTP code.";
        } elseif (time() > $_SESSION['otp_expiry']) {
            // OTP has expired
            $error_message = "OTP has expired. Please try again.";
            header("refresh:3;url=signup.php");
        } else {
            // OTP verified successfully, now insert the user data into the database
            $stmt = $conn->prepare("INSERT INTO account (Name, Username, Password, Email, verified) VALUES (?, ?, ?, ?, 1)");
            $stmt->bind_param("ssss", $_SESSION['name'], $_SESSION['username'], $_SESSION['password'], $_SESSION['email']);

            if ($stmt->execute()) {
                // Clear session data
                unset($_SESSION['name'], $_SESSION['username'], $_SESSION['password'], $_SESSION['email'], $_SESSION['verification_token'], $_SESSION['otp_code'], $_SESSION['otp_expiry']);
                
       // Success message
       $_SESSION['success_message'] = "Your account has been successfully verified! Redirecting to login page...";
    
       // Show the success message and delay the redirect using JavaScript
       echo "<script>
           setTimeout(function() {
               window.location.href = 'login.php';
           }, 3000); // 3 seconds delay
       </script>";
   } else {
       $error_message = "Error inserting data into the database: " . $stmt->error;
   }

            $stmt->close();
        }
    }
}

// Handle Resend OTP button click
if (isset($_POST["resend_otp"])) {
    $token = $_GET['token'];

    // Generate a new OTP code and expiry
    $new_otp_code = rand(100000, 999999);
    $new_otp_expiry = time() + (5 * 60); // 5 minutes validity

    // Update session with new OTP data
    $_SESSION['otp_code'] = $new_otp_code;
    $_SESSION['otp_expiry'] = $new_otp_expiry;

    // Send the new OTP to the user's email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'homesweephomeph@gmail.com';
        $mail->Password   = 'rqzn ebut wdck yohp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        
        $mail->setFrom('vince.enimedez00@gmail.com', 'Home Sweep Home');
        $mail->addAddress($_SESSION['email']);  // Using session-stored email
        $mail->isHTML(true);
        $mail->Subject = 'New Verification Code';
        $mail->Body    = 'Your new OTP code is: <b>' . $new_otp_code . '</b>';

        $mail->send();
        $_SESSION['success_message'] = "New OTP has been sent to your email.";

    } catch (Exception $e) {
        $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['cancel'])) {
    header("Location: login.php");
    exit();
}



$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            max-width: 400px;
            padding: 10px;
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            margin-inline: auto;
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
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn-primary, .btn-secondary {
            display: block;
            width: 60%;
            padding: 10px;
            margin-top: 20px;
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
        .btn-secondary {
            background-color: #dc3545;
        }
        .btn-secondary:hover {
            background-color: #c82333;
        }
        input[type="number"] {
            border: 1px solid #ccc;
            border-radius: 4px;
            background: transparent;
        }
        .input-group-text {
            color: white;
        }
        #otp_code::placeholder {
            color: #333;
            font-size: 12px;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="mcon">
        <div class="container">
            <h2>Verify Your Email Address</h2>
            
            <?php if (isset($_SESSION['success_message'])): ?>
    <p style="color:green;"><?php 
        echo $_SESSION['success_message']; 
        unset($_SESSION['success_message']); // Clear the message after displaying
    ?></p>
<?php elseif (!empty($error_message)): ?>
    <p style="color:red;"><?php echo $error_message; ?></p>
<?php endif; ?>




            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?token=' . $_GET['token']; ?>">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="number" class="form-control" id="otp_code" name="otp_code" placeholder="Enter OTP Code" >
                    </div>
                </div>
                <button type="submit" class="btn-primary">Verify</button>
                <button type="submit" name="resend_otp" class="btn-secondary">Resend OTP</button>
                <button type="submit" name="cancel" class="btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>

