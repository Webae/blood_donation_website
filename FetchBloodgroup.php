<?php
	$data = json_decode(file_get_contents("php://input"), true);
	$columnName = $data['column'];
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
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "Select $columnName from Hospital";
	$result=mysqli_query($conn,$sql);
	//echo mysqli_error($conn);
	$row = $result->fetch_assoc();
	echo $row[$columnName];
?>	