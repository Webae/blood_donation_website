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

?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Search Box</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        right: 5px;
        top: 60%;
	overflow: auto;
        margin-top: -240px;
        height: 450px;
        width: 500px;
        padding: 5px;
        z-index: 5;
	border-style : groove;
	border-radius: 10px;
        border: 4px solid #E74C3C ;
        background: #fff;
      }
     li.B:nth-child(odd){ background: gainsboro ; }
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
      h2{
	margin-left : 17px;
	color : red;
	text-shadow: 3px 2px pink;
	text-decoration : underline;
	}
     
    </style>
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
     <form>	
    <input id="pac-input" class="controls" type="text" placeholder="Search Box"></form>
    <div class="col-sm-6" id="map" ></div>
    <div class="col-sm-6" id="right-panel">
      <h2>You can find your Blood here!</h2>
      <ol id="places"></ol>
    
    </div>
    <script>
      
      function initAutocomplete()
      {
        		var geocoder = new google.maps.Geocoder;
       			var input1;
       			infoWindow = new google.maps.InfoWindow;
			var city;
			 var latlng;	
			var map = new google.maps.Map(document.getElementById('map'), {
          		center: {lat: -33.8688, lng: 151.2195},
          		zoom: 13,
          		mapTypeId: 'roadmap'
        	});

        	// Create the search box and link it to the UI element.
	console.log(navigator.geolocation);
	if (navigator.geolocation) 
	{
			navigator.geolocation.getCurrentPosition(function(position) {
            			var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
					};
	    			latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
            			infoWindow.setPosition(pos);
            			infoWindow.setContent('Location found.');
            			infoWindow.open(map);
            			map.setCenter(pos);
				geocoder.geocode({'location': latlng}, function(results, status) {
          			if (status === 'OK') {
				city=results[4].formatted_address;
				console.log("City is " + city);
				}
				console.log("input is " + input);				
				document.getElementById('pac-input').value="blood near "+ city;
				var input = document.getElementById('pac-input');
				console.log("input is " + input);
        			var searchBox = new google.maps.places.SearchBox(input);
        			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        			// Bias the SearchBox results towards current map's viewport.
        			map.addListener('bounds_changed', function() {
         			 	searchBox.setBounds(map.getBounds());
        			});
				console.log("Places");
			 searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();
			console.log("Places are " + places);
          		var placesList = document.getElementById('places');
         	 	if (places.length == 0) {
              alert('No blood banks found');
           			return;
          		}

          		// Clear out the old markers.
          		//markers.forEach(function(marker) {
          			//marker.setMap(null);
          		// });
          		var markers = [];
			var g=document.getElementById('places');
			g.innerText="";

          		// For each place, get the icon, name and location.
          		var bounds = new google.maps.LatLngBounds();
          		places.forEach(function(place) {
            			if (!place.geometry) {
              				console.log("Returned place contains no geometry");
              				return;
            			}
            		var icon = {
            			url: place.icon,
              			size: new google.maps.Size(71, 71),
              			origin: new google.maps.Point(0, 0),
              			anchor: new google.maps.Point(17, 34),
              			scaledSize: new google.maps.Size(25, 25)
            			};
            		var title=place.name + place.formatted_address; 
                var hosname=place.name;

            		// Create a marker for each place.
            		markers.push(new google.maps.Marker({
              		map: map,
              		icon: icon,
              		title: title,
              		position: place.geometry.location
            		}));
         	var li = document.createElement('li');
		li.setAttribute("class", "B" );
          	li.textContent = place.name;
		li.innerText = place.name + "\n" + "Address : "+ place.formatted_address;
        li.addEventListener('click',function(){
            window.location.href="reward.php?hosname="+hosname;

        });
          	placesList.appendChild(li);

            	if (place.geometry.viewport) {
              // Only geocodes have viewport.
              		bounds.union(place.geometry.viewport);
            	}
		 else {
              		bounds.extend(place.geometry.location);
            	}
          });
	});
         // map.fitBounds(bounds);
	});
	});
	}
}


	</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIjcqiTCV0DPoQGlAhedWfq5zn15hexXw&libraries=places&callback=initAutocomplete"
        async defer></script>
  
  </body>
</html>