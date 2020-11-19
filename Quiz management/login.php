<html>
<head>
<title>login</title>
<link rel="stylesheet" type="text/css" href="login.css">
<body>
  <div class="loginbox">

  
  <h1>Login Here</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>Username</p>
    <input type="text" name="username" value="" id="uname" placeholder="Enter Username" >
    <p>Password</p>
     
  <input type="password" id="pwd" name="password" minlength="8" placeholder="Enter Password"><br><br>
 
    
    <input type="submit" name="btnLogin"  value="Login" id="btnLogin"><br>
    <a href="registration.php">Register Here</a></form>
    <a href="#">Don't have an account?</a>
  </form>
</div>
<script src="login-validation.js"></script>
</body>
</head>
</html>


<?php
function validate()
{
  $username=$_POST["username"];
    $password=$_POST["password"];


//$username= filter_input(INPUT_POST,'username' );
//$password= filter_input(INPUT_POST,'password' );

if(!empty($username)){
	if(!empty($password)){
		$host="localhost";
		$dbusername="root";
		$dbpassword="";
		$dbname="quiz";

		$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
		if(mysqli_connect_error()){
          die('connect Error('. mysqli_connect_errno().') '
          	.mysqli_connect_error());
      }
      else
      {
      	//$sql="INSERT INTO login(username,password)
      	//values('$username','$password') ";

        $sql="select user_id,username from login where username='".trim($username)."' AND password='".trim($password)."';"; 

        $result=$conn->query($sql);
      	if($result->num_rows>0)
      	{
       //echo '<script language="javascript">';
      //echo 'alert(" successfully login")';
      //echo '</script>'; 
      //set session variable 
          session_start();
           while($row = $result->fetch_assoc())
            {
                        $user_id = $row['user_id'];
                        $username = $row['username'];
           }
          $_SESSION["UserId"] = $user_id;
          $_SESSION["UserName"] = $username;
          header("Location: welcome.php");        
return; 
	}
      	else{
      		//echo "Error:" .$sql."<br>". $conn->error;
          echo '<script language="javascript">';
echo 'alert("user is not registered")';
echo '</script>';
      	}
      	$conn->close();
      	}

      }


else{
	//echo "password should not be empty";
  echo '<script language="javascript">';
      echo 'alert("password should not be empty")';
      echo '</script>';
	die();
}
}
else{
	//echo "username should not be empty";
  echo '<script language="javascript">';
      echo 'alert("username should not be empty")';
      echo '</script>';
	die();
}
}

if(array_key_exists('btnLogin',$_POST)){
   validate();
}
	?>

