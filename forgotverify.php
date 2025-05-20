<?php
session_start();
include("db_connect.php"); // Ensure you have a proper database connection

$error_message = "";
$success_message = "";

// Validate the OTP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp_input = $_POST['otp'];

    // Check if the OTP is valid and not expired
    if (isset($_SESSION['otp_code']) && $_SESSION['otp_code'] == $otp_input && time() < $_SESSION['expiry_time']) {
        $success_message = "OTP verified successfully! ";
             // Display the success message before redirecting
             echo "<script type='text/javascript'>alert('$success_message');</script>";
             // Redirect after a short delay
             header("refresh:3;url=forgotnew.php");
             exit();
    } else {
        $error_message = "Invalid or expired OTP.";
    }
}

if (isset($_POST['cancel'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>

       body {
            font-family: Arial, sans-serif;
            background-image: url('bg2.jpg');
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
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        } 
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
           color: #d9534f;
           margin-top: 10px;
           text-align: center;
        }
        .success-message {
           color: #5cb85c;
           margin-top: 10px;
           text-align: center;
       }
        .btn-secondary {
            display: block;
            width: 100%;
            padding: 10px;
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

    </style>
</head>
<body>
    <div class="container">
        <h2>Verify OTP</h2>
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" id="otp">
            <input type="submit" value="Verify OTP">
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