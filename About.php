<?php
session_start();
include ("db_connect.php");
include ("function.php");

$user_data = check_login($con);

?>
<!doctype html>
<html class="no-js"  lang="en">
	<head>
		<!-- META DATA -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- CSS Files -->
     
        <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/abouts/about-2/assets/css/about-2.css" />

				<!-- favicon img -->
				<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.jpg"/>

				<!--font-awesome.min.css-->
				<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		
				<!--animate.css-->
				<link rel="stylesheet" href="assets/css/animate.css" />
		
				<!--hover.css-->
				<link rel="stylesheet" href="assets/css/hover-min.css">
		
				<!--datepicker.css-->
				<link rel="stylesheet"  href="assets/css/datepicker.css" >
		
				<!--owl.carousel.css-->
				<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
				<link rel="stylesheet" href="assets/css/owl.theme.default.min.css"/>
		
				<!-- range css-->
				<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		
				<!--bootstrap.min.css-->
				<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		
				<!-- bootsnav -->
				<link rel="stylesheet" href="assets/css/bootsnav.css"/>
		
				<!--responsive.css-->
				<link rel="stylesheet" href="assets/css/responsive.css" />

		<!-- TITLE OF SITE -->
		<title>HOME SWEEP HOME</title>

		<style>

/*=========== TABLE OF CONTENTS ===========

1.  General css (Reset code)
2. 	Header
3. 	About
===========*/

/*-------------------------------------
		1.General css (Reset code)
--------------------------------------*/


*{

	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-o-box-sizing:border-box;
	-ms-box-sizing:border-box;
	box-sizing:border-box;

}

body{
    position: relative;
	background-image: url('assets/images/bg.jpg');
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	font-family: 'Poppins', sans-serif;
	overflow-x:hidden;
}

a,a:hover,a:active,a:focus {
	display:inline-block;
	text-decoration:none;
	font-size:13px;
	padding:0;
    margin:0;
}

ul{
	padding: 0;
    margin: 0;
    list-style: none;
}

html,body{
    z-index: 2;
}

/*-------------------------------------
		2. Header
--------------------------------------*/

.top-area {
    position: absolute;
    width: 100%;
}
.wrapper {
    position: relative;
    z-index: -1;
}

/*.sticky-wrapper */
.sticky-wrapper {
    position: relative;
    z-index: 2;
    transition:.7s;
}
.is-sticky .header-area:after{
    position:absolute;
    content:'';
	background-color:transparent;
    backdrop-filter: blur(10px); 
    height:100%;
    width:100%;
    top:0;
    left:0;
    z-index:-1;
    -webkit-transition:all 0.5s linear;
    -moz-transition:all 0.5s linear;
    -ms-transition:all 0.5s linear;
    -o-transition:all 0.5s linear;
    transition: all 0.5s linear;
}
.sticky-wrapper.is-sticky .main-menu .nav a:before{
    bottom: 17.6px;
}/*.sticky-wrapper */


/*.logo*/
.logo {
    margin-top: 10px;
	margin-bottom: 20px;
	margin-right: 60px;
}

.logo img {
    width: 250px; /* Adjust the size as needed */
    height: 100px; /* Adjust the size as needed */
 
}


/*.logo*/

/*.main-menu*/
.main-menu {position:relative;}
.main-menu ul .nav .navbar-nav {
    text-align:right;
    float:none;
}
.main-menu .nav li {
    position:relative;
    padding: 16px 12px 0px;
    -webkit-transition:all 0.2s linear;
    -moz-transition:all 0.2s linear;
    -ms-transition:all 0.2s linear;
    -o-transition:all 0.2s linear;
    transition: all 0.2s linear;
}
.main-menu .nav li a{
    padding: 11px 0 29px;
	margin-top: 20px;
    color: #fff;
    font-size: 16px;
    text-transform: capitalize;
    font-family: 'Poppins', sans-serif;
    font-weight:500;
    -webkit-transition: all 0.25s ease-in-out 0s;
    -moz-transition: all 0.25s ease-in-out 0s;
    -o-transition: all 0.25s ease-in-out 0s;
    transition: all 0.25s ease-in-out 0s;
}
.main-menu  .nav  li.active a,
.main-menu  .nav  li a:hover,
.main-menu .nav  li a:focus{
    color: #00d8ff;
    background-color:transparent;
}
.main-menu .nav a:before{
    position: absolute;
    content: "";
    width: 0px;
    height: 2px;
    bottom: -2.4px;
    left: 0;
    background: transparent;
    -webkit-transition: .3s ease-in-out;
    -ms-transition: .3s ease-in-out;
    -moz-transition: .3s ease-in-out;
    -o-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
    
}
.main-menu .nav li.active  a:before,
.main-menu .nav a:hover:before{
    background: #00d8ff;
    width: 100%;
}

/*.main-menu*/

/* tooggle */
.main-menu .navbar-toggle {
    margin-top: 5px;
    border: 1px solid;
    font-size: 16px;
    float:left;
}
.main-menu .navbar-toggle {
    color: #00d8ff;
}
.main-menu .navbar-default .navbar-toggle:focus, 
.main-menu .navbar-default .navbar-toggle:hover {
    background-color: transparent;
}

.custom-section {
  margin-top: 100px; /* Adjust this value according to your preference */
}

.img-fluid {
    margin-top: 30px;
    height: 400px;
    width: 450px;

}

.rounded {
    border-radius: 5%;
}

.custom-section h2 {
    color: #333; 
}

.custom-section p {
    color: black;
}

.custom-section .fs-5 {
    color: black;
}
/*book-btn*/
button {
	background-color: #007bff;
     color: #fff;

    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition:  0.3s ease;
    margin-bottom: 5%;
}
a{
    color: white;
}
button:hover{
    background-color: #0056b3;
}/*book-btn*/

/*FOOTER*/
footer{
			padding-top: 5%;
			background-color:#68D2E8;
			width: 100%;
			color:white;
			padding: 0;
			font-size: 13px;
			line-height: 20px;
			font-family: 'Shanti',sans-serif;
			position: absolute;
			bottom: auto;
		}
		.row2{
			width: 80%;
			margin: auto;
			margin-top: 3%;
			display: flex;
			flex-wrap: wrap;
			align-items: flex-start;
			justify-content: space-between;
		}
		.coll{
			flex-basis: 20%;
			padding: 5px;
		
		}
		.coll:nth-child(2).col:nth-child(3){
			flex-basis: 20%;
		}
		.logo5{
			width: 250px;
			margin-bottom: 25px;
		}
		.coll h3{
			width: fit-content;
			margin-bottom: 40px;
			margin-top: 30px;
			padding-top: 20px;
			position: relative;
			font-size: 25px;
		}
		
		.email-id{
			width: fit-content;
			border-bottom: 1px solid;
		}
		ul{
			line-height: 10px;
			padding-left: 1px;
		}
		ul li{
			list-style-type: none;
			margin-bottom: 12px;
			text-align: left;
		
		}
		ul li a{
			text-decoration: none;
			color: #F5F5F5;
		}


		
		.social5{
			height:50px;
			cursor: pointer;
			padding: 8px;
		}
		.social5-icons{
			display: flex;
			
			


		}
		form{
			padding-bottom: 15px;
			display:flex;
			align-items: center;
			justify-content: space-between;
			border-bottom: 1px solid #ccc;
			margin-bottom: 20px;
		}
		form .far{
			font-size: 18px;
			margin-right: 10px;
		}
		form input{
			width: 100%;
			background: transparent;
			color: #ccc;
			border: 0;
			outline: none;
		}
		form button{
			background: transparent;
			border: 0;
			outline: none;
			cursor:pointer;
			color: #ccc;
			font-size: 18px;
		}
		hr{
			width: 90%;
			border: 0;
			border-bottom: 2px solid  ;
			margin: 20px auto;
			color: white;
		}
		.copyright{
			text-align: center;
		}

    </style>
</head>
<body>

	<!-- main-menu Start -->
    <header class="top-area">
			<div class="header-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="logo">
								<a href="#">
									<img src="Logo2.png" alt="Logo">
								</a>
							</div><!-- /.logo-->
						</div><!-- /.col-->
						<div class="col-sm-10">
							<div class="main-menu">
							
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<i class="fa fa-bars"></i>
									</button><!-- / button-->
								</div><!-- /.navbar-header-->
								<div class="collapse navbar-collapse">		  
									<ul class="nav navbar-nav navbar-right">
										<li><a href="index.php">Home</a></li>
										<li><a href="Services.php">Services </a></li>
										<li><a href="About.php">About us</a></li>
										<li><a href="mybook.php"> My Booked</a></li>
										<li>
										<?php if (isset($_SESSION['username']))  ?>
											<div class="logout">
												<a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
										</li><!--/.project-btn--> 
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.main-menu-->
						</div><!-- /.col-->
					</div><!-- /.row -->
					<div class="home-border"></div><!-- /.home-border-->
				</div><!-- /.container-->
			</div><!-- /.header-area -->

		</header><!-- /.top-area-->
		<!-- main-menu End -->
<br><br><br>


<!-- About 2 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8 custom-section">
    
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">


      <div class="col-12 col-lg-6">

    

        <img class="img-fluid rounded" loading="lazy" src="./about2.jpg" alt="">
        
      </div>


      <div class="col-12 col-lg-6">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-10">
            <h2 class="h1 mb-3">Why Choose Our Cleaning Services?</h2>
            <p class="lead fs-4 mb-3 mb-xl-5">With years of dedicated service and a profound understanding of the cleaning industry, we boast a track record of excellence that speaks for itself. Our commitment to quality and innovation ensures that we're always at the forefront of the cleaning sector.</p>
            <div class="d-flex align-items-center mb-3">
              <div class="me-3 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
              </div>
              <div>
                <p class="fs-5 m-0">Our evolution procedure is super intelligent.</p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <div class="me-3 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
              </div>
              <div>
                <p class="fs-5 m-0">We deliver services beyond expectations.</p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-4 mb-xl-5">
              <div class="me-3 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
              </div>
              <div>
                <p class="fs-5 m-0">Let's hire us to reach your objectives.</p>
              </div>
            </div>
            <button type="button" > <a href="Services.php"> Book Now </a> </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<footer>
      <div class="row2">
			<div class="coll">
				<img src="assets/logo/logo2.png" alt="LOGO" class="logo5">
				<p> 
				Home Sweep Home is a premier professional cleaning 
				service dedicated to providing top-tier cleanliness and organization 
				for homes and businesses alike. With a commitment to excellence and customer 
				satisfaction, we offer a range of tailored cleaning solutions to meet every need. 
				</p>
			</div>
			<div class="coll">
				<h3>Location</h3>
				<p>Zone 7, San Miguel</p>
				<p>Nabua, Camarines Sur</p>
				<p>Philippines</p>
				<p class="email-id">homesweephome@gmail.com</p>
				<h4>09123456789</h4>
			</div>
			<div class="coll">
				<h3>Links</h3>
				<ul>
					<li>
						<a href="index.php">HOME</a>
					</li>
					<li>
						<a href="Services.php">SERVICES</a>
					</li>
					<li>
						<a href="About.php">ABOUT US</a>
					</li>
					<li>
						<a href="mybook.php"> MY BOOKED </a>
					</li>
				</ul>
			</div>
			<div class="coll">
				<h3>Contact us</h3>
				<form>
				<i class="fa-solid fa-envelope"> </i>
				<input type="email" placeholder="  Enter your email id" required>
				<button type="submit"><i class="fa-solid fa-arrow-right"></i> </button>
				</form>
				<div class="social-icons">
					<a href=""><img src="assets/logo/facebook.png" class="social5"></a>
					<a href=""></a><img src="assets/logo/instagram.png" class="social5"></a>
					<a href=""></a><img src="assets/logo/telegram.png"class="social5"></a>
				</div>
			</div>
      </div>
      <hr>
      <p class="copyright"> HomeSweepHome2024 - All Right Reserved </p>
       
     </footer>







	<script src="assets/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!--modernizr.min.js-->
		<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


		<!--bootstrap.min.js-->
		<script  src="assets/js/bootstrap.min.js"></script>

		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!-- jquery.filterizr.min.js -->
		<script src="assets/js/jquery.filterizr.min.js"></script>

		<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!--jquery-ui.min.js-->
        <script src="assets/js/jquery-ui.min.js"></script>

        <!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

		<!--owl.carousel.js-->
        <script  src="assets/js/owl.carousel.min.js"></script>

        <!-- jquery.sticky.js -->
		<script src="assets/js/jquery.sticky.js"></script>

        <!--datepicker.js-->
        <script  src="assets/js/datepicker.js"></script>

		<!--Custom JS-->
		<script src="assets/js/custom.js"></script>

    <script>
        document.getElementById('play-button').addEventListener('click', function () {
            var video = document.getElementById('video-player');
            if (video.paused) {
                video.play();
                this.innerHTML = 'Pause Video';
            } else {
                video.pause();
                this.innerHTML = 'Play Video';
            }
        });
    </script>
    <script src="assets/js/script.js"></script>
	</body>
</html>
