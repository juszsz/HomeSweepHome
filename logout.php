<?php
session_start();
include("db_connect.php"); // Ensure you include your database connection

// Clear the "Remember Me" cookies
setcookie('remember_username', '', time() - 3600, "/");
setcookie('remember_token', '', time() - 3600, "/");

// If the user is logged in, remove the remember token from the database
if (isset($_SESSION['accountid'])) {
    $accountid = $_SESSION['accountid'];

    // Clear the remember_token in the database
    $sql = "UPDATE account SET remember_token = NULL WHERE accountid = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $accountid);
    $stmt->execute();
    $stmt->close();
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: Login.php");
exit();
?>
