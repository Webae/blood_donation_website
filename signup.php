<?php include("/Applications/XAMPP/xamppfiles/htdocs/blood-donation-master/navf.php"); ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet "type="text/css" href="css/loginc.css">
<h5>Congratulations!<br>You are one step closer from saving someone's life!</h5>
</head>
<body>
<div class="forms" >
<form id="formsign" action="sign.php" name="formsign" method="post">
<label for="name">Name</label>
<input type="text" name="name" id="name" >
<br><br>
<label for="email">Email</label>
<input type="email" name="email" id="email" >
<br><br>
<label for="password">Password </label>
<input type="password" name="password" id="password" >
<br><br>
<label for="mobile">Mobile</label>
<input type="tel" name="mobile" id="mobile" >
<br><br>
<label for="bloodgroup">BloodGroup</label>
<select  id="bloodgroup"  name="bloodgroup" class="form-control">
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>AB+</option>
<option>AB-</option>
<option>O+</option>
<option>O-</option>
</select>
<br><br>
<label for="age">Age</label>
<input type="text" name="age" id="age" >
<br><br>
<input type="submit" id="test" value="Create Account">
<input type="button" value="Clear" onclick="this.form.reset()">
</form>
</div>
</body>
</html>

<!-- <script>
function clear()
{
document.getElementById("username").value="";
}

</script> -->