<?php
if (!isset($_SESSION)) { session_start(); }
if(isset($_SESSION['userid']))
{
    $user=$_SESSION['userid'];
}
else
{
    $user="";
}
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
    <script>
        function check(){
            var user1='<?php echo "$user"; ?>';
            console.log("Inside navf");
            console.log(user1);
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
            session_destroy();
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
        <input type="text" id="point" value="<?php echo $row['points']?>">
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Redeem</button>
      </div>
    </div>
  </div>
</div>
<div>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index2.php">WEBAE</a>
            <!-- <a href="index.html" class="logo">Webae</a> -->
					</div>
					<script>
						// function fcall(){
						// 	console.log('inside function');
						// 	var id = "<?php echo '$userid'; ?>";
						// 	if(id == null)
						// 	{
						// 	document.location='login.php';
						// 	}
						// 	else{
						// 		document.location='map.html';
						// 	}
						// }
                        // <script>
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
            <ul class="nav navbar-nav navbar-right" id="list">
                <li class="active"><a href="index2.php">Home</a></li>
                
               
                  <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown"  >
                          Donate
                          </a>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a onclick="fcall()">Search blood banks near you</a></li>
                            <li><a href="mapd.php">Search blood banks in specific location</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              Rewards
                              </a>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="maprl.php">Search blood banks near you</a></li>
                                <li><a href="mapr.php">Search blood banks in specific location</a></li>
                                <li><a data-toggle="modal" href="#exampleModal">Reward Points</a></li>
                            </ul>
                    </li>
                <li id = "sign"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li id="log"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              <li id="out" style="visibility:hidden" onclick="bahar()"><a>Sign Out</a></li>
            </ul>
          </div>
        </div>
      </nav>
</body>

 </html>