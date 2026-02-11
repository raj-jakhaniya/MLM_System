<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
?>
<?php

    include("connection.php");
    extract($_POST);
    $sql="update admin set admin_id='$admin_id',admin_name='$admin_name',email='$email',mobile='$mobile' where id=$id";
    mysqli_query($link,$sql)or die(mysqli_error($link));
    
?>
<script>
	alert("Admin Data Updated Successfully!");
	window.location.href="Admin_View.php";
</script>
<?php
    }
	else if($_SESSION['role']=='admin')
	{
?>
<script>
	alert("Go To Update Form!");
	window.location.href="Admin_Update.php";
</script>
<?php
	}
	else
	{
		require("Admin_Session.php");
	}
?>