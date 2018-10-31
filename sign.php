<?php
require 'PHPMailerAutoload.php';
// echo '<script language="javascript">';
// echo 'console.log("hjdb");';
// echo '</script>';
if(!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["mobile"]) and !empty($_POST["bloodgroup"]) and !empty($_POST["age"]))
    //if(isset($_POST["name"]))
    {
        // echo '<script language="javascript">';
        // echo 'console.log("hjdb");';
        // echo '</script>';
        $name = $_POST["name"];
        $email=$_POST["email"];
        $passwordd=$_POST["password"];
        $mobile=$_POST["mobile"];
        $bloodgroup=$_POST["bloodgroup"];
        $age=$_POST["age"];
        
        
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "bloodwebsite";
    
        
        $conn = new mysqli($servername, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 
        // $sql = "Insert into User(name,email,password,bloodgroup,phoneno,age,points) values('$name','$email','$passwordd','$bloodgroup','$mobile',$age,0);";
        // $result=mysqli_query($conn,$sql);
        
        // echo mysqli_error($conn);
        // echo "hey inside";
        $sql = "Select email from User where email like '$email';";
        $result=mysqli_query($conn,$sql);
        echo mysqli_error($conn);
        $row=mysqli_fetch_array($result);
    
        if ($result->num_rows==0) 
        {
        
        $sql1 = "Insert into User(name,email,password,bloodgroup,phoneno,age,points) values('$name','$email','$passwordd','$bloodgroup','$mobile',$age,0);";
        $result1=mysqli_query($conn,$sql1);
        session_start();
        $_SESSION['userid']=$email;

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
  $mail->addAddress("$email");               // Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');
  
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML
  
  $mail->Subject = 'Signed into Webae';
  $mail->Body    = 'You have successfully registered with Webae.Hope you have a wonderful experience with us.';
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }

        echo '<script language="javascript">';
        echo 'document.location="index2.php"';
        echo '</script>';
        }
        else
        {
        
        echo '<script language="javascript">';
        echo 'alert("Account already exists");';
        echo 'document.location="signup.php"; ';
        echo '</script>';	
        }
    }
    else
    {
        echo "hello";
        echo '<script language="javascript">';
        echo 'alert("Please fill details");';
        echo 'document.location="signup.php"; ';
        echo '</script>';	
    }

?>