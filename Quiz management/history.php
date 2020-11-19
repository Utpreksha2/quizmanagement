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
    <li><a  href="welcome.php">Home</a></li>
    <li><a class="active" href="#">History</a></li>
  
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
    <th>Quiz</th> 
    <th>Question Solved</th>
    <th>Right Answer</th>
    <th>Wrong Answer</th>
    <th>Score</th>
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

     $sql="select  hm.Topic as TopicName,h.Questions_solved as QuestionSolved
			,h.Right_ans as RightAns, h.wrong_ans as WorngAns,h.score as Score from history h
			join login l on l.user_id = h.login_id
			join home hm on hm.sr_no=h.home_id
			where l.user_id=".$_SESSION['UserId'].";"; // user id is hardcoded set session variable for user_id and username after login
     if($result = $conn->query($sql))
     {
      $rankCount = 1;
            while($row = $result->fetch_assoc())
            {
                        $rank = $rankCount++;
                        $topicname = $row['TopicName'];
                        $questionsolved = $row['QuestionSolved'];
                        $right_ans = $row['RightAns'];
                        $wrong_ans = $row['WorngAns'];
                        $score = $row['Score'];

                         echo "<tr>
                                     <td>$rank</td>
                                     <td>$topicname</td>
                                     <td>$questionsolved</td>
                                     <td>$right_ans</td>
                                     <td>$wrong_ans</td>
                                     <td>$score</td>
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
