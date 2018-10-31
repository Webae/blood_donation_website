
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
	$row = $result->fetch_assoc();
	$point= $row['points'];
	
	echo mysqli_error($conn);
	$row=mysqli_fetch_array($result);
}
else
{
    $user="";
}

?><html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Instruction Page</title>
        <link rel="stylesheet" href="assets/css/main.css" />
		 <link href="css/bootstrap.css" rel="stylesheet">
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <style> 
            body,html{
                height: 100%;
                margin: 0;
                /* background-color:lightcoral; */
                background-color:darksalmon;
            } 
            p{
                color:white;
                font-size: 15pt;
            }
            h2{
                color:black;
                font-size: 21pt;
            }
            h3{
                font-size: 18pt;
            }
            .bg{
                /* background-image:url("https://thumbs.dreamstime.com/z/man-hand-giving-red-heart-to-woman-charity-health-care-donation-medicine-concept-men-cardiogram-68364118.jpg"); */
                background-image: url("http://blog.doctoroz.com/wp-content/uploads/2013/05/Heartinhands-638x425.jpg");
                height: 80%;
                /* background-position: center; */
                background-repeat: no-repeat;
                background-size:cover;
            }
            .bg2{
                background-image:url("https://lz12v4f1p8c1cumxnbiqvm10-wpengine.netdna-ssl.com/wp-content/uploads/2015/11/sour-tropical-yellow-orange-gradient.jpg");
                height: 80%;
                background-size:cover;
                background-repeat: repeat;
                padding: 0%;
            }
        </style>
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
                          <input type="text" id="point" value="<?php echo $point?>">
                          <input type="text" id="verificationcode" value=""placeholder="Enter verification code here">
                        </div>
                        <div class="modal-footer">
                  
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="redeem">Redeem</button>
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
                  
    <div class="bg">
        <h1 style="position: absolute;
        top: 5%;
        left: 22%;
        font-size: 34pt;
        color:black;
        ">What to Do Before, During and After Your Donation</h1>
    </div>
        <ul>
            <li>
                    <h2><u>Before Your Donation</u></h2>
                    
                <ol>
                        <li>
                        
                        <h3 style="color:black">Make an Appointment</h3>
                        <p>Select a donation type and find a convenient time that works best for you.</p>
                        
                                         <a href="#"></a> <!--Put link of appointment page -->
                                            <img src="https://image.freepik.com/free-vector/hand-with-pen-mark-calendar_1325-126.jpg" width="100px ">
                                        </a>
                        </li>
                        <li>
                                <h3 style="color:black">Eat Iron-Rich Foods</h3>
                            <p>Eat iron-rich foods, such as red meat, fish, poultry, beans, spinach, iron-fortified cereals or raisins<br></p>
                            <img class="icon-image" src="http://parenting.firstcry.com/wp-content/uploads/2018/03/388305553-H.jpg" width="100px ">
                                 
                        </li>
                        <li>
                                <h3 style="color:black">Be Well Rested and Hydrate</h3>
                            <p>Get a good night's sleep the night before your donation, eat healthy foods and drink extra liquids.<br></p>
                            
                              <img src="https://i.pinimg.com/736x/ed/3e/c4/ed3ec4365eebde800e92307e1d80f930--ui-ux-planners.jpg" width="100px">
                                   
                        </li>
                </ol>
            </li>
            <li>
                    <h2><u>On the Day of Your Donation</u></h2>    
                <ol>
                        <li>
                          
                        <h3 style="color:black">Photo ID</h3>
                        <p >Please bring your donor card, driver's license or two other forms of identification.</p>
                               
                          <img  src="http://wfarm4.dataknet.com/static/resources/icons/set178/b10537a8.png" width="100px ">
                                  
                        </li>
                        <li>
                                <h3  style="color:black">Medication list</h3>
                            <p>We'll need to know about all prescription and over-the-counter medications you're taking.<br></p>
                            
                                                <img src="https://media.istockphoto.com/vectors/clipboard-and-check-marks-flat-style-design-vector-illustration-vector-id586715692" width="100px ">             
                        </li>
               </ol>
            </li>
            <li>
                    <h2><u>After Your Donation</u></h2>                   
                <ol>
                        <li>
                        
                        <h3 style="color:black">Enjoy a Snack</h3>
                        <p >Relax for a few minutes in our refreshment and recovery area — have some cookies or other snacks — you’ve earned it!</p>
                          <img  src="https://i.pinimg.com/originals/e8/1c/89/e81c8986d1cc8b177d5d8f30b128a04a.jpg" width="100px ">
                                                
                        </li>
                        <li>
                                <h3 style="color:black">Tell Others About Your Good Deed</h3>
                            <p >The gratification of giving blood is a feeling you'll want to share.<br></p>
                                <img src="https://media.istockphoto.com/vectors/two-friendly-male-mature-students-chatting-and-two-friends-toget-vector-id636341104?k=6&m=636341104&s=612x612&w=0&h=Jw28hp7L_xQ2VtB8QCVetneqJ7J_FfNuQ59C8miQ4ek=" width="100px ">
                                   
                        </li>
                        <li>
                                <h3 style="color:black">Drink Extra Liquids</h3>
                            <p>Drink an extra four (8 oz.) glasses of liquids and avoid alcohol over the next 24 hours.<br></p>
                            <img src="https://thumb1.shutterstock.com/display_pic_with_logo/1450451/692253673/stock-vector-glass-of-water-cartoon-vector-and-illustration-hand-drawn-style-isolated-on-white-background-692253673.jpg" width="100px ">   
                        </li>
                </ol>
            </li>        
        </ul>
  
    </body>
    </html>