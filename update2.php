<?php
include 'db_connect.php';

$accountid=$_GET['updateid'];
$sql = "Select * from `account` where accountid=$accountid";
$result =mysqli_query($con, $sql);
$row =mysqli_fetch_assoc($result);
    $email = $row['email'];
    $password = $row['password'];
    $username = $row['username'];

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        $sql = "update `account` set accountid='$accountid', email='$email' , password='$password' ,  username='$username'
        where accountid=$accountid";

        $result=mysqli_query($con, $sql);
        if($result){
            
            header('location:accounts.php');
        }else{
            die(mysqli_error($con));
        }
    }
    ?>
        
        <!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.jpg"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Vy9RQDLHk+64Lk5w5R5A6bt/97DQkHfVw58Y4AHjrsFu4qNf7v4uVWUKzJZ3P0O0r/37LKVvZSf4DoyZun/Y2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>HOME SWEEP HOME</title>
  <style>

    body {
          font-family: Arial, sans-serif;
          background-image: url('Signup.jpg');
	        background-size: cover;
	        background-position: center;
	        background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
    }
    .container {
            margin-left: 550px;
            max-width: 400px;
            padding: 10px;
            background-color: transparent;
            border-radius: 5px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(11px);
        }
        .form-group {
            margin-bottom: 20px;
            margin-top: 20px;
        
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
        .input-group-text{
            color: white;
        }
       
       #username::placeholder {
       color:  #333;
        font-size: 12px;
        }
        #password::placeholder {
       color:  #333;
        font-size: 12px;
        }
        #email::placeholder {
       color:  #333;
        font-size:12px;
        }
        #confirm_password::placeholder {
       color: #333;
        font-size: 12px;
        }

        .input-group {
      position: relative;
    }
    .input-group-text {
      background-color: transparent;
      border: none;
    }
  </style>
</head>
<body>

<div class="container">
    <form method="POST">

      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
        // Validate password and confirm password fields
        document.querySelector('form').onsubmit = function(){
            let password = document.querySelector('#password').value;
            let confirm_password = document.querySelector('#confirm_password').value;
            if(password !== confirm_password) {
                alert('Passwords do not match');
                return false;
            }
        }
    </script>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process your form data here
    // For demonstration purposes, let's assume the form processing is successful

    // Redirect the user to clients.php after successful form submission
    header("Location: accounts.php");
    exit(); // Make sure to exit after redirection to prevent further execution
}
?>

