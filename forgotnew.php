    <?php
    session_start();
    include("db_connect.php"); // Ensure you have a proper database connection

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php'; 
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $error_message = "";
    $success_message = "";

    // Check if the session is valid
    if (!isset($_SESSION['email'])) {
        header("Location: forgotpass.php"); // Redirect if session is invalid
        exit();
    }

    // Process new password submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate password
        if ($new_password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } elseif (strlen($new_password) < 6) {
            $error_message = "Password must be at least 6 characters long.";
        } else {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $stmt = $con->prepare("UPDATE account SET password = ? WHERE Email = ?");
            $stmt->bind_param("ss", $hashed_password, $_SESSION['email']);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                // Send the new password to the user's email
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
                    $mail->addAddress($_SESSION['email']); // User's email

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Confirmation';
                    $mail->Body    = 'Your password has been successfully reset. Your new password is: <strong>' . $new_password . '</strong>';

                    $mail->send();
                    $success_message = "Your password has been updated successfully, and the new password has been emailed to you.";
                    
                    // Clear session data
                    unset($_SESSION['otp_code'], $_SESSION['email'], $_SESSION['expiry_time']);
                    
                    // Display the success message before redirecting
                    echo "<script type='text/javascript'>alert('$success_message');</script>";
                    // Redirect after a short delay
                    header("refresh:3;url=login.php");
                    exit();
                } catch (Exception $e) {
                    $error_message = "Password updated, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $error_message = "Failed to update password. Please try again.";
            }
            $stmt->close();
        }
    }

    // Handle cancel action
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <title>New Password</title>
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
                    margin-top: 5%;
                    max-width: fit-content;
                    margin-inline: auto;
                    max-width: 400px;
                    padding: 50px;
                    background-color: transparent;
                    border-radius: 8px;
                    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                    backdrop-filter: blur(10px);
                }
                h2 {
                    text-align: center;
                    margin-top: -10px;
                    color: white;
                    font-size: 30px;
                }
                label {
                    font-size: 13px;
                    font-weight: bold;
                    color: #333;
                }
                input[type="password"], input[type="text"] {
    width: 80%; /* Full width for responsiveness */
    padding: 10px 15px; /* Add padding for better usability */
    font-size: 10px; /* Readable font size */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle inner shadow */
    transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
}

input[type="password"]:hover, input[type="password"]:focus,
input[type="text"]:hover, input[type="text"]:focus {
    border-color: #007BFF; /* Highlight border on hover/focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Glow effect */
    outline: none; /* Remove default focus outline */
}


                /* Style for submit buttons */
                input[type="submit"] {
                    color: #fff; /* White text */
                    background-color: #007BFF; /* Blue background */
                    border: none; /* Remove border */
                    border-radius: 5px; /* Rounded corners */
                    cursor: pointer; /* Pointer cursor on hover */
                    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth hover effect */
                    width: 100%;
                    padding: 10px;
                    font-size: 14px;
                }

                /* Hover state for submit buttons */
                input[type="submit"]:hover {
                    background-color: #0056b3; /* Darker blue on hover */
                    transform: scale(1.05); /* Slight zoom effect */
                }

                /* Disabled state for submit buttons */
                input[type="submit"]:disabled {
                    background-color: #ccc; /* Gray background */
                    cursor: not-allowed; /* Show not-allowed cursor */
                }

                .eye-button {
                    padding-left: 40px;
                    padding-top: 10px;
                    position: absolute;
                    margin-left: -30px; /* Adjusted to position the eye icon */
                    cursor: pointer;
                    background: none;
                    border: none;
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

                .password-container {
                    position: relative;
                }
                .btn-secondary {
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

        </head>
        <body>
        <div class="container">
                <h2>Set New Password</h2>
                <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="POST">


                <div class="password-container">
    <label for="new_password">Enter New Password:</label>
    <input type="password" name="new_password" id="new_password" placeholder="Enter New Password"
        pattern="^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$"
        title="Password must be at least 8 characters long and include letters, numbers, and special characters">
    <button type="button" class="eye-button" id="toggleNewPassword">
        <i class="fas fa-eye" id="newPasswordEyeIcon"></i>
    </button>
</div>

<br>

<div class="password-container">
    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
    <button type="button" class="eye-button" id="toggleConfirmPassword">
        <i class="fas fa-eye" id="confirmPasswordEyeIcon"></i>
    </button>
</div>


                <br> 
                <input type="submit" value="Reset Password"> 
                <br> <br>
                <button type="submit" name="cancel" class="btn-secondary">Cancel</button>
                </form>

                <?php if (!empty($error_message)): ?>
                    <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <?php if (!empty($success_message)): ?>
                    <p class="success-message"><?php echo $success_message; ?></p>
                <?php endif; ?>
            </div>

            <script>
           document.addEventListener('DOMContentLoaded', function() {
    // Toggle for new password field
    const toggleNewPassword = document.querySelector("#toggleNewPassword");
    const newPassword = document.querySelector("#new_password");
    const newPasswordIcon = toggleNewPassword.querySelector("i"); // Select the icon inside the button

    toggleNewPassword.addEventListener("click", function () {
        const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
        newPassword.setAttribute("type", type);

        // Toggle icon class without removing button styles
        if (type === "password") {
            newPasswordIcon.classList.remove("fa-eye-slash");
            newPasswordIcon.classList.add("fa-eye");
        } else {
            newPasswordIcon.classList.remove("fa-eye");
            newPasswordIcon.classList.add("fa-eye-slash");
        }
    });

    // Toggle for confirm password field
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const confirmPassword = document.querySelector("#confirm_password");
    const confirmPasswordIcon = toggleConfirmPassword.querySelector("i"); // Select the icon inside the button

    toggleConfirmPassword.addEventListener("click", function () {
        const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
        confirmPassword.setAttribute("type", type);

        // Toggle icon class without removing button styles
        if (type === "password") {
            confirmPasswordIcon.classList.remove("fa-eye-slash");
            confirmPasswordIcon.classList.add("fa-eye");
        } else {
            confirmPasswordIcon.classList.remove("fa-eye");
            confirmPasswordIcon.classList.add("fa-eye-slash");
        }
    });
});


            </script>

        </body>
        </html>