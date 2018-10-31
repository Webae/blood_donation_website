<?php
session_start();

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
	echo mysqli_error($conn);
	$row=mysqli_fetch_array($result);
}
else
{
    $user="";
}

?>



<html>
	<head>
		<title>WeBae</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
     <link href="css/bootstrap.css" rel="stylesheet">
     <link href="css/donate.css" rel="stylesheet">
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function check(){
            var user1='<?php echo $user; ?>';
            console.log("Inside");
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
	echo '<script>';
	echo 'alert( "points is " + $localpoints + $user1);';
	echo '</script>';
	$sql = "Update User SET points=$localpoints where email like '$user1' and code = $otp ";
	$result=mysqli_query($conn,$sql);
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
      <!-- <form action="">
        Hospital name: <input type="text" name="fname"><br>
        Last name: <input type="text" name="lname"><br>
        <input type="submit" value="Submit">
      </form> -->
      <div class="container">  
        <form id="contact" action="" method="post">
          <h3>Donate Page</h3>
          
          
          <fieldset>
          Hospital Name : <input type=text id="hname" class="form-control">
          </fieldset>
          <fieldset>
          Blood Group : <input type=text id="bgname" class="form-control">
          </fieldset>
          <fieldset>
            Preferred Date : <br><input type="date" id="dateslot">
          </fieldset>
          <fieldset>
		Select Preferred Slot :
		<select  id="bloodgroup" name="slot" class="form-control">
		<option>8 a.m. to 10 a.m.</option>
		<option>10 a.m. to 12 p.m.</option>
		<option>2 p.m. to 4 p.m.</option>
		<option>4 p.m. to 6 p.m.</option>
		<option>6 p.m. to 8 p.m.</option>
		
		</select>
</fieldset>
          
          <fieldset>
            <button name="contact-submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
  
        </form>
      </div>
    </body>
</html>
<?php
require 'PHPMailerAutoload.php';
  
  $user=$_SESSION['userid'];
  $servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "bloodwebsite";
	$conn = new mysqli($servername, $username, $password, $database);
  // Check connection
  
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "Select bloodgroup from User where email like '$user';";
	$result=mysqli_query($conn,$sql);
	//echo mysqli_error($conn);
	$row = $result->fetch_assoc();
  $bg= $row['bloodgroup'];
  
  echo '<script language="javascript">';
    // echo "console.log('blood group is '+$bg+'array is'+$row); ";
    echo "document.getElementById('bgname').value='$bg' ";
    echo '</script>';
    $hosname=$_GET['hosname'];
    echo '<script language="javascript">';
    echo "document.getElementById('hname').value= '$hosname' ";
    echo '</script>';
    $sql = "Select name from User where email like '$user';";
	$result=mysqli_query($conn,$sql);
	//echo mysqli_error($conn);
  $row = $result->fetch_assoc();
  
  $name= $row['name'];
  
function testfun()
{
  $user1=$GLOBALS['user'];
  $slot=$_POST['slot'];
  $dateslot=new DateTime($_POST['dateslot']);
  
  $mail = new PHPMailer;
  
  $mail->SMTPDebug = 3;                               // Enable verbose debug output
  
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'rikengala@gmail.com';                 // SMTP username
  $mail->Password = 'treehouse';                           // SMTP password
  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 465;                                    // TCP port to connect to
  
  $mail->setFrom('rikengala@gmail.com', 'WeBae');
  //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
  $mail->addAddress('rikengala@gmail.com');               // Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');
  
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML
  $rand=rand(0,100000);


  $mail->Subject = 'WeBae Appointment';
  $mail->Body    = 'Name : '.$GLOBALS['name'].'</b>'.' OTP : ' .$rand. '</b>'.' Time Slot : '.$slot.'</b>'.' Date : '.$dateslot->format('d/m/Y').'</b>';
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
  if(!$mail->send()) {
    echo '<script language="javascript">';
    echo 'alert("message not sent")';
    echo '</script>';


      //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    
    $sql = "Update User Set code= $rand where email like '$user1';";
    $result=mysqli_query($GLOBALS['conn'],$sql);
    // echo $result;
    echo '<script language="javascript">';
    echo 'alert("Your appointment has been booked at the hospital of your choice. Please read the instructions before donating"); ';
    echo "document.location='htmlprac.php';";
    echo '</script>';
    //echo mysqli_error($conn);s
    

  }
}

if(array_key_exists('contact-submit',$_POST)){
   testfun();
}

?>