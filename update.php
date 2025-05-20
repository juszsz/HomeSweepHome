<?php
include ('db_connect.php');


$serviceid=$_GET['updateid'];
$sql = "Select * from `services` where serviceid=$serviceid";
$result =mysqli_query($con, $sql);
$row =mysqli_fetch_assoc($result);
    $servicename = $row['servicename'];
    $time = $row['time'];
    $price = $row['price'];
    $contact_details = $row['contact_details'];
    $calendar = $row['calendar'];

    if(isset($_POST['submit'])){
        $servicename = $_POST['servicename'];
        $time = $_POST['time'];
        $price = $_POST['price'];
        $contact_details = $_POST['contact_details'];
        $calendar = $_POST['calendar'];

        $sql = "update `services` set serviceid='$serviceid', servicename='$servicename', time='$time', price='$price' , contact_details='$contact_details' , calendar='$calendar'
        where serviceid=$serviceid";

        $result=mysqli_query($con, $sql);
        if($result){
            
            header('location:clients.php');
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

  <title>HOME SWEEP HOME</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      background-image: url('assets/images/bg.jpg');
	        background-size: cover;
	        background-position: center;
	        background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
    }
    .container-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 100%;
            padding: 0 20px; /* Add some padding to separate containers */
        }

        .container {
            width: 700px;
            padding: 20px;
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }



        h2 {
            text-align: center;
            margin-top: 0;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="time"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 2px;
            background-color: #f9f9f9;
        }

        input[type="text"][readonly] {
            background-color: #f9f9f9;
            cursor: not-allowed;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="text"]::placeholder,
        input[type="date"]::placeholder {
            color: #777;
        }

        #contact_details::placeholder {
            font-size: 12px;
        }


  </style>
</head>
<body>


<div class="container">
    <form method="POST">

      <div class="form-group">
        <label for="servicename">Type of Service</label>
        <select class="form-control" id="servicename" name="servicename" onchange="updatePrice()" required>
          <option value="">Select a service</option>
          <option value="Regular Cleaning" data-price="25000">Regular Cleaning</option>
          <option value="Deep Cleaning" data-price="4000">Deep Cleaning</option>
          <option value="Move-In/Move-Out Cleaning" data-price="6000">Move-In/Move-Out Cleaning</option>
          <option value="Post-Construction Cleaning" data-price="7500">Post-Construction Cleaning</option>
          <option value="Specialized Cleaning" data-price="9500">Specialized Cleaning</option>
          <option value="Office/Commercial Cleaning" data-price="15000">Office/Commercial Cleaning</option>
        </select>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" required readonly>
      </div>

      <div class="form-group">
        <label for="contact_details">Contact Details</label>
        <input type="text" class="form-control" id="contact_details" name="contact_details" placeholder="Enter Contact Details" required>
      </div>

      <div class="form-group">
        <label for="time">Time</label>
        <input type="time" class="form-control" id="time" name="time" required>
      </div>

      <div class="form-group">
        <label for="calendar">Date</label>
        <input type="date" class="form-control" id="calendar" name="calendar" required>
      </div>

      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
    </form>
  </div>

  <script>
    function updatePrice() {
      var service = document.getElementById('servicename');
      var price = service.options[service.selectedIndex].getAttribute('data-price');
      document.getElementById('price').value = price;
    }
  </script>
  

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process your form data here
    // For demonstration purposes, let's assume the form processing is successful

    // Redirect the user to clients.php after successful form submission
    header("Location: clients.php");
    exit(); // Make sure to exit after redirection to prevent further execution
}
?>

