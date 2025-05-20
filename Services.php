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
		<title> HOME SWEEP HOME </title>

		<style>


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

.packages{
    padding:120px 0 90px;
}
.packages-content{
    margin-top:65px;
}
.gallary-header{
    color: white;
	font-size: 500px;
}

.single-package-item{
    margin-bottom: 30px;
    padding-bottom: 20px;
	background-color:transparent;
    backdrop-filter: blur(10px); 
    box-shadow: 0 0 20px rgba(0,0,0,.1);
    -webkit-transition: .5s; 
    -moz-transition:.5s; 
    -ms-transition:.5s; 
    -o-transition:.5s;
    transition: .5s;
}
.single-package-item-txt{
    padding: 0 25px;
}
.single-package-item img {
    width: 100%;
}
.single-package-item h3{
    position: relative;
    font-size: 20px;
    color: black;
    font-weight:500;
    font-family: 'Poppins', sans-serif;
    padding: 20px 0;
}
.single-package-item h3:after{
    position: absolute;
    content: " ";
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #ebebeb;
}
.packages-para{
    padding:17px 0 0;
    text-transform: capitalize;
}
.packages-para p{
    font-size: 14px;
    color: #0c0a0a;
    font-family: 'Poppins', sans-serif;
    margin-bottom:15px;
}
.packages-para p span{
    display: inline-block;
    width: 150px;
}
.packages-review p i{
    color: #f2ff02;
    font-size: 16px;
}
.packages-review span{
    margin-left: 20px;
    font-size: 14px;
    color: #1fe3da;
    font-family: 'Poppins', sans-serif;
    text-transform: capitalize;
}
.about-view.packages-btn{
    width: 110px;
    height: 35px;
    font-size: 14px;
    color: #ffffff;
	background-color: #00d8ff;
	border-radius: 5%;
	border-color: #00d8ff;
    text-transform: capitalize;
    -webkit-transition: .5s; 
    -moz-transition:.5s; 
    -ms-transition:.5s; 
    -o-transition:.5s;
    transition: .5s;
}

.about-view.packages-btn a {
    color: #ffffff;
    font-size: 14px;
	text-transform: capitalize;
    -webkit-transition: .5s; 
    -moz-transition:.5s; 
    -ms-transition:.5s; 
    -o-transition:.5s;
    transition: .5s;
}

.about-view.packages-btn:hover{
    box-shadow: 0 5px 20px rgba(3, 3, 3, 0.3);
}
.single-package-item:hover{
    box-shadow: 0 0 20px rgba(0,0,0,.2);
}

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
									<li>
                                    <?php if (isset($_SESSION['username']))  ?>
											<div class="logout">
												<a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
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


	   
		<!--packages start-->
		<section id="pack" class="packages">
			<div class="container">
				<div class="gallary-header text-center">
					<h1>
						SERVICES OFFER
					</h1>

				
				</div><!--/.gallery-header-->
				
				<div class="packages-content">
					<div class="row">

						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="assets/images/packages/Regular Cleaning.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3> Regular Cleaning <span class="pull-right"> ₱25000 </span></h3>
									<div class="packages-para">
										<p>
                                          Regular cleaning services involve routine tasks such as vacuuming, dusting, mopping floors, cleaning surfaces, and tidying up common areas in homes or offices. It's designed to maintain cleanliness and hygiene on a regular basis.
										</p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>2,734 reviews</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn">
										<button  class="about-view packages-btn">
										<a href="booknow.php"> book now </a>
										</button>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->

						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="assets/images/packages/DeepCleaning.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3> Deep Cleaning <span class="pull-right">₱4000</span></h3>
									<div class="packages-para">
										<p>
											 Deep cleaning services offer a thorough and comprehensive cleaning of a property, targeting areas that are not typically covered in regular cleaning. This may include cleaning inside appliances, scrubbing grout, washing windows, and addressing neglected areas to restore the property to a pristine condition.
										</p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>1,234 reviews</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn">
										<button  class="about-view packages-btn">
										<a href="booknow.php"> book now </a>
										</button>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->
						
						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="assets/images/packages/Move-Out Cleaning.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Move-In/Move-Out Cleaning<span class="pull-right">₱6000</span></h3>
									<div class="packages-para">
										<p>
											Move-in/move-out cleaning services are designed for properties that are changing occupancy. They involve a detailed cleaning of all areas, including inside cabinets, appliances, and fixtures, to ensure the space is clean and welcoming for new occupants or before vacating the premises.
										</p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>19,456 reviews</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn">
										<button  class="about-view packages-btn">
										<a href="booknow.php"> book now </a>
										</button>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->
						
						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="assets/images/packages/Post-Construction Cleaning.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Post-Construction Cleaning<span class="pull-right">₱7500</span></h3>
									<div class="packages-para">
										<p>
											Post-construction cleaning services focus on removing dust, debris, and construction materials left behind after a renovation or construction project. It includes thorough cleaning of surfaces, floors, and fixtures to prepare the space for occupancy or final inspection.
										</p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>29,232 reviews</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn">
										<button  class="about-view packages-btn">
										<a href="booknow.php"> book now </a>
										</button>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->
						
						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="assets/images/packages/Specialized Cleaning.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Specialized Cleaning<span class="pull-right">₱9500</span></h3>
									<div class="packages-para">
										<p>
											Specialized cleaning services cater to specific needs, such as carpet cleaning, upholstery cleaning, window cleaning, and pressure washing. These services address particular areas or surfaces that require specialized equipment or techniques for optimal cleanliness and maintenance.
										</p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>34,543 reviews</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn">
										<button  class="about-view packages-btn">
										<a href="booknow.php"> book now </a>
										</button>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->
						
						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="assets/images/packages/Commercial Cleaning.webp" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Office/Commercial Cleaning<span class="pull-right">₱15000</span></h3>
									<div class="packages-para">
										<p>
											Office and commercial cleaning services are tailored to businesses and commercial properties. They encompass general office cleaning, restroom sanitation, floor care, and other tasks to uphold a clean and professional environment conducive to productivity and customer satisfaction.
										</p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>42,221 reviews</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn">
										<button  class="about-view packages-btn">
										<a href="booknow.php"> book now </a>
										</button>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->

					</div><!--/.row-->
				</div><!--/.packages-content-->
			</div><!--/.container-->

		</section><!--/.packages-->
		<!--packages end-->

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