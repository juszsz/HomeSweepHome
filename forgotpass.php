<?php
session_start();
include("db_connect.php"); // Ensure you have a proper database connection
include("function.php"); // If you have any helper functions

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php'; 
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$error_message = "";
$success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if email field is empty
    if (empty($email)) {
        $error_message = "Email is required.";
    } else {
        // Check if the email exists in the database
        $stmt = $con->prepare("SELECT * FROM account WHERE Email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user_data = $result->fetch_assoc();
            $otp_code = random_int(100000, 999999); // Generate a 6-digit OTP
            $expiry_time = time() + 300; // OTP valid for 5 minutes

            // Store the OTP and expiry in the session
            $_SESSION['otp_code'] = $otp_code;
            $_SESSION['email'] = $email;
            $_SESSION['expiry_time'] = $expiry_time;

            // Send the OTP via email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'homesweephomeph@gmail.com'; // Your email
                $mail->Password   = 'rqzn ebut wdck yohp'; // Your email password
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                $mail->setFrom('homesweephomeph@gmail.com', 'Home Sweep Home');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset OTP';
                $mail->Body    = 'Your OTP for password reset is: <strong>' . $otp_code . '</strong>';

                $mail->send();
                $success_message = 'A password reset OTP has been sent to your email.';
                
                 // Display the success message before redirecting
                 echo "<script type='text/javascript'>alert('$success_message');</script>";
                 // Redirect after a short delay
                 header("refresh:3;url=forgotverify.php");
                 exit();
            } catch (Exception $e) {
                $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $error_message = "No account found with that email address.";
        }
        $stmt->close();
    }
}

if (isset($_POST['cancel'])) {
    header("Location: login.php");
    exit();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bg.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: transparent;
            box-shadow: 1px 1px 2px;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: black;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .error-message {
            color: #d9534f;
            text-align: center;
        }
        .success-message {
            color: #5cb85c;
            text-align: center;
        }
        .btn-secondary {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .btn-secondary {
            background-color: #dc3545;
        }
        .btn-secondary:hover {
            background-color: #c82333;
        }
        </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="email">Enter your email:</label>
            <input type="email" name="email" id="email" >
            <input type="submit" value="Send OTP">
            <button type="submit" name="cancel" class="btn-secondary">Cancel</button>
        </form>

        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>