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
	$point=$row['points'];
}
else
{
    $user="";
}

?>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  
  </head>
  <script>
	function price(t){
	g=parseInt(document.getElementById('hquana').value);
	h=parseInt(document.getElementById('hquanr').value);
	i=parseInt(document.getElementById('rpoint').value);
	j=(document.getElementById('cost1'));	
	if (g < h)
	{
		document.getElementById('hquanr').value="";
		return;
	}
	else
	{
	d=document.getElementById('cost');
	z=t*300;
	d.value=z;
	z=z-i*3;
	j.value=z;

	}
}

</script>
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
	  <h3 align="center">Buy Your Blood</h3>
  <form action="" method="post">
		<div class="container" class=form-control>
		<div>
		Your reward points : <input type=text id=rpoint class="form-control">
		</div>
		<div>
		Hospital Name : <input type=text id=hname class="form-control">
		</div>
		<div>
		Select Blood Group :
		<select value="Select your blood" id="bloodgroup" name="bloodgroup" class="form-control">
		<option>A+</option>
		<option>A-</option>
		<option>B+</option>
		<option>B-</option>
		<option>AB+</option>
		<option>AB-</option>
		<option>O+</option>
		<option>O-</option>
		</select>
		</div>
		<div>
		Quantity Available : <input readonly type=text id="hquana" name="hquana" class="form-control"></input>
		</div>
		<div>
		Quantity Required : <input type=text id="hquanr" name="hquanr" class="form-control" onchange="price(this.value)"></input>
		</div>
		<div>
		Total Cost : <input type=text id=cost class="form-control">
		</div>
		<div>
		Cost After Using Reward Points : <input type=text id=cost1 class="form-control">
		</div>
		<div><br>
		<input type="submit" value="Buy" class="form-control" name="buy" id="buy">
		</div> 
		
		</div>
		
</form>
<?php
function fn()
{
	$rq=$_POST['hquanr'];
	$av=$_POST['hquana'];
	$ch=$av-$rq;

	$columnName=$_POST['bloodgroup'];
	if ($columnName == "A+") {
		$columnName="Aplus";
}
elseif ($columnName == "B+") {
		$columnName="Bplus";
}
elseif ($columnName == "AB+") {
		$columnName="ABplus";
}
elseif ($columnName == "O+") {
		$columnName="Oplus";
}
elseif ($columnName == "A-") {
		$columnName="Amin";
}
	elseif ($columnName == "B-") {
		$columnName="Bmin";
}
elseif ($columnName == "AB-") {
		$columnName="ABmin";
}
elseif ($columnName == "O-") {
		$columnName="Omin";
}
$servername = "localhost";
$username = "root";
$password = "root";
$database = "bloodwebsite";
// Create connection
$user=$_SESSION['userid'];
$conn = new mysqli($servername, $username, $password, $database);
	$sql1 = "Update Hospital set $columnName=$ch;";
	$result=mysqli_query($conn,$sql1);
	echo mysqli_error($conn);
	$sql2 = "Update User set points=0 where email like '$user' ;";
	$result=mysqli_query($conn,$sql2);
	echo mysqli_error($conn);
}	
if(array_key_exists('buy',$_POST))
{
	fn();
}
?>

</body>
</html>
<?php
$hospname=$_GET['hosname'];

?>

	
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script>
document.getElementById('hname').value="<?php echo $hospname; ?>";
document.getElementById('rpoint').value="<?php echo $point; ?>";
$('#bloodgroup').on('change', function (e) {
	var val = $('#bloodgroup').val();
	console.log("values is " + val);
	axios.post("FetchBloodgroup.php", {
		column: val
	})
	.then (function (response) {
		console.log(response);
		$('#hquana').val(response.data);

	})
	.catch (function (response) {
		alert('error');
	})
});


</script>
 