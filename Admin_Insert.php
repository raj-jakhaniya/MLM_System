<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
?>
<?php

	include("connection.php");
	extract($_POST);
	$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	$sql="insert into admin(admin_id,admin_name,password,email,mobile) values('$admin_id','$admin_name','$password','$email','$mobile')";
	mysqli_query($link,$sql) or die(mysqli_error($link));
	
?>
<script>
	alert("Admin Registration Successfully!");
	window.location.href="Admin_View.php";
</script>
<?php
    }
	else if($_SESSION['role']=='admin')
	{
?>
<script>
	alert("Go To Registration Form!");
	window.location.href="Admin_Registration.php";
</script>
<?php
	}
	else
	{
		require("Admin_Session.php");
	}
?>