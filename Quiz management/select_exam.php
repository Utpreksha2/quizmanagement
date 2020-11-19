<?php
session_start();
if (!isset($_SESSION("username"))) 
{

	 ?>
	 <script type="text/javascript">
	 	window.location = "login.php";
	 </script>
	 <?php
}
?>

<?php
include "connection.php";
include "header.php";
?>
	<div class = "row" style = "...">
		<div class = "" style = "min-height: 500px; background-color: white;">
			<?php
			$res=mysqli_query($link,"select * from exam_category");
			while ($row=mysqli_fetch_array($res)) 
			{
				?>
				<input type ="button" class ="btn btn-success form-control" value ="<?php echo $row[""category]; ?>" style = "margin-top: 10px; background-color: blue; color: white" onclick = "set_exam_type_session(this.value);">
				<?php
			}
			?>
		</div>
	</div>

<?php
include "footer.php"
?>

<script type="text/javascript">
	function set_exam_type_session(exam_category)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				alert(xmlhttp.responseText);
				window.location="welcome.php";	
			}

		};
		xmlhttp.open("GWT","foarajax/set_exam_type_session.php?exam_category="+ exam_category,true);
		xmlhttp.send(null);


	}
</script>

include "header.php";
?>

	<div class = "row" style = "...">
		<div class = "" style ="...">
		</div>
	</div>

<?php
include "footer.php";
?>