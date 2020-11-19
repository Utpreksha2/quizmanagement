<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Online Quiz System</title>
<link rel="stylesheet" href="style.css">
<head>
<script type="text/javascript">
	window.history.forward();
	function noBack() { window.history.forward(); }
</script>
<style>
table, th, td  {
  border: 2px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;

}
</style>

</head>
<body onload="noBack();" 
	onpageshow="if (event.persisted) noBack();" onunload="">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="wrapper">
<nav class="navbar">
  <img class="logo" src="quizz.png">

  <ul>
    <li><a class="active" href="#">Home</a></li>
    <li><a target="_self" href="history.php">History</a></li>
  
     <li><a href="ranking.php">Ranking</a></li>

    
    <li><a href="logoutmiddleware.php">Log out</a></li>


  </ul>
</nav>
<center>
  <div id="subject">
<h2>
 <p id="blink">
<font color="Red">Select your subject</font></p></h2>
<br>
<br>
<table style="width:80%" bordercolor = "green" >

  
  <?php
  // check session on page load
  session_start();
if(!isset($_SESSION["UserName"])){
 header("Location: login.php"); 
 return;  
}


  $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="quiz";

    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error())
{
            printf("Connect failed: %s\n", $conn->connect_error);
            exit();
}
else
 {

                        $set=@$_GET['set'];
                        $n=@$_GET['n'];
                        $total=@$_GET['tn'];
			            $sql="select qm.qm_title as Title, qo.qo_options as Options,qo.isrightoption as IsRightOption from question_master qm
                                        join question_options qo on qo.qo_question_master_id = qm.qm_id
                                        where  qm.topic_id=$set and qm.qm_id=$n;";

     if($result = $conn->query($sql))
     {
		 
	   $counter = 1;
	   $qn = number_format($n);
	   $qn++;
            while($row = $result->fetch_assoc())
            {
				$isright = $row["IsRightOption"];
				if($counter<=1){
					$topic = $row["Title"];
					
						  
				echo "
					<tr>
						<th colspan=2>$n:: $topic</th>
						</tr>";
				}
				$counter++;
                        $options = $row['Options'];

                         echo "<tr>
                                     <td><input value='$isright' type='radio' name='option'/></td>
									  <td>$options</td>
                               </tr>
							  ";
          }
		  if($n!=$total){
		  echo " <tr>
		  <td>Right Answers: ".$_SESSION["rightans"]."</td>
							   <td style='direction:rtl'><a href='quetions.php?set=$set&n=$qn&tn=10'>Next</a></td>
							   </tr>";
		  }
		  else{
			  echo " <tr>
		  <td>Right Answers: ".$_SESSION["rightans"]."</td>
							   <td style='direction:rtl'><a href=''>Submit</a></td>
							   </tr>";
		  }
		   if($n!="1"){
			   if(isset($_POST["option"])){
			 $ans = number_format($_POST["option"]);
			 $_SESSION["rightans"] = $ans + number_format($_SESSION["rightans"]);
			   }
		 }
		 else{
			 $_SESSION["rightans"] = 0;
		 }
    }
}
$conn -> close();

  ?>

</table>
</div>
</center>
</div>
</form>
</body>
</html>
