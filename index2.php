<?php
session_start();
require 'PHPMailerAutoload.php';
if(isset($_SESSION['userid']))
{
	$user=$_SESSION['userid'];
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "bloodwebsite";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "Select points from User where email like '$user'";
	$result=mysqli_query($conn,$sql);
	$row = $result->fetch_assoc();
	$point= $row['points'];
	echo mysqli_error($conn);
	$row=mysqli_fetch_array($result);
}
else
{
    $user="";
}

?>
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)

-->
<html>
	<head>
		<title>WeBae</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		 <link href="css/bootstrap.css" rel="stylesheet">
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type='text/javascript'>
		</script>
		<script>
        function check(){
            var user1='<?php echo $user; ?>';
            // console.log("Inside");
            if(user1 != "")
            {
                var element = document.getElementById("sign");
                element.parentNode.removeChild(element);

                var element1= document.getElementById("log");
                element1.parentNode.removeChild(element1);

                
                var element=document.getElementById("out");
                element.style.visibility="visible";
                
                
                //newElement.addEventListener('onclick',check1());
                
            }
            
        }
        window.onload=check;
				function bahar(){
					 <?php
						//  unset($_SESSION['userid']);  
						//  session_destroy();  
						?>
            window.location='login.php';
        }
		
		</script>
		
	</head>
	<body>
				
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Your Reward Points</h5>
				
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="point" value="<?php echo $point?>">
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Redeem</button> -->
      </div>
    </div>
  </div>
 
</div>

<div class="modal fade" id="redeemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<h5 class="modal-title" id="redeemModalLabel">Your Reward Points</h5>
				
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <form action="" method="post">
        <input type="text" name="point" id="point" value="<?php echo $point?>">
		<input type="text" name="verificationcode" id="verificationcode" value="" placeholder="Enter verification code here">
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="redeem" name="redeem">Redeem</button>
	
	<?php

if(array_key_exists('redeem',$_POST))
{
	$otp=$_POST['verificationcode'];
	redeempoints();
}
function redeempoints()
{
	
	$user1=$GLOBALS['user'];
	$otp=$GLOBALS['otp'];
	$otp=(int)$otp;
	$point=$_POST['point'];
	$localpoints=$point+100;
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "bloodwebsite";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	// echo '<script>';
	// echo 'alert( "points is " + $localpoints + $user1);';
	// echo '</script>';
	$sql = "Update User SET points=$localpoints where email like '$user1' and code = $otp ";
	$sql5 = "Update User SET code=NULL where email like '$user1' ";
	$result=mysqli_query($conn,$sql);
	// echo '<script>';
	// 	echo "alert('$result'); ";
	// 	echo '</script>';
	if($result==0){
		echo '<script>';
		echo "alert('Verification failed'); ";
		echo '</script>';
	}
	$result2=mysqli_query($conn,$sql5);
	echo mysqli_error($conn);
}

?>
</form>
      </div>
    </div>
  </div>
</div>

	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index2.php">WEBAE</a>
            
					</div>
					<script>
						function fcalldl(){
															console.log('inside function')
															var id='<?php echo $user; ?>';
															if(id == '')
															{
																document.location='login.php';
															}
															else{
																document.location='mapdl.php';
															}
						}
						function fcalld(){
															console.log('inside function')
															var id='<?php echo $user; ?>';
															if(id == '')
															{
																document.location='login.php';
															}
															else{
																document.location='mapd.php';
															}
						}
						function fcallrl(){
															console.log('inside function')
															var id='<?php echo $user; ?>';
															if(id == '')
															{
																document.location='login.php';
															}
															else{
																document.location='maprl.php';
															}
						}
						function fcallr(){
															console.log('inside function')
															var id='<?php echo $user; ?>';
															if(id == '')
															{
																document.location='login.php';
															}
															else{
																document.location='mapr.php';
															}
						}
						
												
						</script>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index2.php">Home</a></li>
                
               
                  <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                          Donate Blood
                          </a>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a onclick="fcalldl()">Search blood banks near you</a></li>
                            <li><a onclick="fcalld()">Search blood banks in specific location</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              Receive Blood
                              </a>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a onclick="fcallrl()">Search blood banks near you</a></li>
								<li><a onclick="fcallr()">Search blood banks in specific location</a></li>
								<li><a data-toggle="modal" href="#exampleModal">Reward Points</a></li>
								<li><a data-toggle="modal" href="#redeemModal">Redeem points</a></li>
                            </ul>
                    </li>
                <li id="sign"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							<li id="log"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							<li id="out" style="visibility:hidden" onclick="bahar()"><a>Sign Out</a></li>
            </ul>
          </div>
        </div>
      </nav> 

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Are You Ready To Save A Life<br><span><b>You can be one of 36,599 registered donors on WeBae</b></span></h1>
					<h2>We are expanding fast- Join our movement and support the cause.</h2>
					<ul class="actions">
						<!-- <li><a href="#" class="button alt">Get Started</a></li> -->
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one">
				<div class="inner">
					<header>
						<h2>Facts about Blood</h2>
					</header>
					<p>
						<br>
						<h4>We at WeBae aim to promote blood donation in India and the very first step is to educate people about Blood Donation</h4></p>
						<br>
						<ul>
							<li><h5>Someone needs blood every two seconds.</h5></li>
							<li><h5>One pint of blood can save up to three lives.<h5></li>
							<li><h5>Four main red blood cell types: A, B, AB and O. Each can be positive or negative for the Rh factor. AB is the universal recipient; O negative is the universal donor of red blood cells.</h5></li>
							<li><h5>17 percent of non-donors cite “never thought about it” as the main reason for not giving, while 15 percent say they’re too busy.</h5></li>
						</ul>
					<ul class="actions">
						<li><a href="htmlprac.php" class="button alt">Learn More </a></li>
					</ul>
				</div>
			</section>

		<!-- Two -->
			<!-- <section id="two">
				<div class="inner">
					<article>
						<div class="content">
							<header>
								<h3>Pellentesque adipis</h3>
							</header>
							<div class="image fit">
								<img src="images/pic01.jpg" alt="" />
							</div>
							<p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>
						</div>
					</article>
					<article class="alt">
						<div class="content">
							<header>
								<h3>Morbi interdum mol</h3>
							</header>
							<div class="image fit">
								<img src="images/pic02.jpg" alt="" />
							</div>
							<p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>
						</div>
					</article>
				</div>
			</section> -->

		<!-- Three -->
			<section id="three">
				<div class="inner">
					<article>
						<div class="content">
							<span class="icon fa-laptop"></span>
							<header>
								<h3>Why Webae?</h3>
							</header>
							<p>One for All,All for One</p>
							
						</div>
					</article>
					<article>
						<div class="content">
							<span class="icon fa-diamond"></span>
							<header>
								<h3>Google Maps API</h3>
							</header>
							<p>User gets to search for nearest hospital or blood bank near his location</p>
							
						</div>
					</article>
					<article>
					<div class="content">
							<span class="icon fa-laptop"></span>
							<header>
								<h3>Reward Points</h3>
							</header>
							<p>WeBae has come up with an innovative and fun points system where donors can receive points for donating blood which can be redeemed when they require blood</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Footer -->
			<section id="footer">
				<div class="inner">
					<header>
						<h2>Get in Touch</h2>
					</header>
					<form method="post" action="#">
						<div class="field half first">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6"></textarea>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="alt" /></li>
						</ul>
					</form>
				
				</div>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			
	</body>
</html>


