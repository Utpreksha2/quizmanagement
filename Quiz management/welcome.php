<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Online Quiz System</title>
<link rel="stylesheet" href="style.css">
<head>
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
<body>
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
  <tr>
    <th>S.N</th>
    <th>Topic</th> 
    <th>Total Questions</th>
     <th>Marks</th>
    <th>Action</th>
  </tr>
  
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
  
     $sql="select h.Topic as TopicName,h.Total_question as TotalQuestions,h.marks as Marks  from home h;";
     if($result = $conn->query($sql))
     {
      $rankCount = 1;
            while($row = $result->fetch_assoc())
            {
                        $rank = $rankCount++;
                        $topic = $row['TopicName'];
                        $totalquestion = $row['TotalQuestions'];
                        $marks = $row['Marks'];

                         echo "<tr>
                                     <td>$rank</td>
                                     <td>$topic</td>
                                     <td>$totalquestion</td>
                                     <td>$marks</td>
                                     <td><a href='quetions.php?set=$rank&n=1&tn=10'>START</a></td>
                               </tr>";
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
