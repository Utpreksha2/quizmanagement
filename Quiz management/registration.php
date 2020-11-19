
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<title>JavaScript Form Validation using a sample registration form</title>
<meta name="keywords" content="example, JavaScript Form Validation, Sample registration form" />
<meta name="description" content="This document is an example of JavaScript Form Validation using a sample registration form. " />
<link rel='stylesheet' href='js-form-validation.css' type='text/css' />
<script src="sample-registration-form-validation.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body onload="document.registration.userid.focus();">

<h1>Registration Form</h1>
<form name='registration' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onSubmit="return formValidation();">
<ul><b>
<label for="username">User Name:</label>
<input type="text" name="username" size="12" /><br>
<label for="uname"> Name:</label>
<input type="text" name="name" size="50" /><br>
<label for="college">College:</label>
<select id="lstCollege" name="ucollege"><br>
<option selected="" value="Default">(Please select a college)</option>
<option value="1">Somaiya</option>
<option value="2">Atharva</option>
<option value="3">Thakur</option>
<option value="4">SNDT</option>
<option value="5">Viva</option>
</select><br>
<label for="uemail">Email:</label>
<input type="text" name="email" size="50" /><br>
<label for="passid">Password:</label>
<input type="password" name="passid" size="12" /><br>

<label id="gender">Gender:</label>
<input type="radio" id="male" name="gender" value="M"><label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="F"><label for="female">Female</label>
<input type="submit" name="submit" value="Submit" /></b>
</ul>
</form>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>




<?php 
//we create function for register the user
function register(){

//initialise database connection here
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
		  if(trim($_POST["username"]) == "" || trim($_POST["name"]) == "" || trim($_POST["ucollege"])=="" ||  trim($_POST["email"])=="" || trim($_POST["passid"])=="" || trim($_POST["gender"])==""){
			  echo "<script language='javascript'>alert('Please fill all data!');</script>";
			  return;
			  
		  }
		  	//store all input values into variables
		$username=$_POST["username"];
		$name=$_POST["name"];
		$college=$_POST["ucollege"];
		$email=$_POST["email"];
		$password=$_POST["passid"];
		$gender=$_POST["gender"];
		  //created insert query for login table here, specify columns to add note do not use aut_increment column here like userid in database
      	$sql="INSERT INTO login(username,password,Name,College,email,gender)
      	values('$username','$password','$name','$college','$email','$gender');";
		if($conn->query($sql)){
			header("Location: login.php");
		}
		else{
			echo "<script language='javascript'>alert('Error in registering the data!');</script>";
		}
       }
}

if(array_key_exists('submit',$_POST)){
   register();
}

?>









