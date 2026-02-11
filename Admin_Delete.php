<?php
	session_start();
    if(isset($_POST['id']))
	{
?>
<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="delete from admin where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Admin Data Deleted Successfully!");
	window.location.href="Admin_View.php";
</script>
<?php
	}
	else if($_SESSION['role']=='admin')
	{
?>
<script>
	alert("Go To View Page!");
	window.location.href="Admin_View.php";
</script>
<?php
	}
	else
	{
		require("Admin_Session.php");
	}
?>