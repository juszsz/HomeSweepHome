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
     /* Makes the image circular */
 
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

/*-------------------------------------
		3. 	About
--------------------------------------*/

.about-us{
	display: flex;
    justify-content: center;
    align-items: center;
	position: relative;
	
	background-position: center;
	min-height: 100vh;
	margin-bottom: 0;
	
}

/*about-us-content*/
.about-us-content{
	margin: 5% 0 0 10%;
    justify-content: center;
	

}
.about-us h2 {
	color:#fff;	
	font-size:84px;
	max-width: 800px;
	font-weight: 600;
	
	
}
.about-us span{
	color:#fdfbfb;
	font-size:30px;	
	
}
.about-btn {
	display: inline-block;
	margin: 2px;
    margin-top: 10px;
    letter-spacing: 1.2px;
     -webkit-transition: 0.5s ease-in-out;
    -moz-transition: 0.5s ease-in-out;
    -ms-transition: 0.5s ease-in-out;
    -o-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
}
.about-view {
	display: flex;
    justify-content: center;
    align-items: center;
    background: #00d8ff;
    border: 1px solid #00d8ff;
    width: 200px;
    height: 60px;
    white-space: nowrap;
    color: #fff;
    font-size:16px;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    border-radius: 5px;
    box-shadow: 0 5px 20px rgba(14,15,18,.2);
    -webkit-transition: 0.5s ease-in-out;
    -moz-transition: 0.5s ease-in-out;
    -ms-transition: 0.5s ease-in-out;
    -o-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
}

.about-view a{
	display: flex;
    justify-content: center;
    align-items: center;
    background: #00d8ff;
    border: 1px solid #00d8ff;
    width: 200px;
    height: 60px;
    white-space: nowrap;
    color: #fff;
    font-size:16px;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    border-radius: 5px;
    box-shadow: 0 5px 20px rgba(14,15,18,.2);
    -webkit-transition: 0.5s ease-in-out;
    -moz-transition: 0.5s ease-in-out;
    -ms-transition: 0.5s ease-in-out;
    -o-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
}
.about-btn:hover .about-view{
    color: black;
    background: transparent;
    box-shadow: 0 5px 20px rgba(14,15,18,.7);
	border: 1px solid #00d8d5;
}
.travel-mrt-0{
    margin-top: 0px;
}
/*book-btn*/
.book-btn {
	margin-top: 25px;
	margin-left: 25px;
	background: #00d8ff;
    border: 1px solid transparent;
    width: 100px;
    height: 30px;
    white-space: nowrap;
    text-align: center;
    color: #fff;
    font-size:12px;
    font-family: 'Poppins', sans-serif;
    text-transform: capitalize;
    border-radius: 5px;
    -webkit-transition: 0.5s ease-in-out;
    -moz-transition: 0.5s ease-in-out;
    -ms-transition: 0.5s ease-in-out;
    -o-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
}
.book-btn:hover{
    background: transparent;
	box-shadow: 2px 2px  4px;
    backdrop-filter: blur(11px);
    border: 1px solid #00d8d5;
}/*book-btn*/

h1 {
	color: #03AED2;
	text-shadow: 1px 1px 2px #000000;
}
.girl img{
	height: 150%;
	width:140%;
}
.girl{
margin: 0 10% 0 0;
	padding-top: 0;
}



.b4{
	background: #03AED2;
	color:#fdfbfb;
	font-size:30px;	
	text-align: center;
	text-shadow: 2px 2px 4px #000000;
	padding: 5%;
	margin-top: 0;

}


.video-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
        }

        .video-container video {
            width: 100%;
            height: auto;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 30px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .play-button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /*video player*/

		/*vFOOTER*/
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
			border-bottom: 1px solid #ccc ;
			margin: 20px auto;
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
										<li><?php if (isset($_SESSION['name']))  ?>
											<div class="logout">
												<a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
											</div>
											

											</div>
										</div>
                                        </li>
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

		<!--about-us start -->
		<section id="home" class="about-us">

			<div class="container">
				
				<div class="about-us-content">
					
					
						<div class="col-sm-12">
							<div class="single-about-us">
								<div class="about-us-txt">
								<div class="row">
						<h1>
							Welcome <?php echo $user_data['name'];
							?>!
						</h1>
									<h2>
										HOME SWEEP HOME
										
										
									</h2>
									<span>
										Professional cleaning services
									</span>
									<br>
									<div class="about-btn">
										<button  class="about-view">
										<a href="About.php"> LEARN MORE </a>
										</button>
									</div><!--/.about-btn-->
									<div class="about-btn">                          
									
										<button  class="about-view">
										<a href="Services.php"> BOOK NOW </a> 
										</button>
									</div><!--/.about-btn-->
								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-0">
						</div><!--/.col-->
						
					</div><!--/.row-->
					
				</div><!--/.about-us-content-->
				
			</div><!--/.container-->
			<div class="girl">
			<img src="assets/images/girl.png">
			</div>
		</section><!--/.about-us-->

		<section id="vid">
			     <!-- video player -->
			<h4 class="b4">
				Sweeping Ways to Elegance
			</h4>
		   <div class="video-container">
           <video id="video-player" controls>
            <source src="Commercial.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <!-- video player -->
		</section>


	

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


	</body>
</html>