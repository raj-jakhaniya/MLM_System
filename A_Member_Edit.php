<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
?>
<?php

    include("connection.php");
    extract($_POST);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql="update member set member_id='$member_id',member_name='$member_name',email='$email',mobile='$mobile',status='$status' where id=$id";
    mysqli_query($link,$sql)or die(mysqli_error($link));

?>
<script>
	alert("Member Data Updated Successfully!");
	window.location.href="Admin_Member_View.php";
</script>
<?php
    }
	else if($_SESSION['role']=='admin')
	{
?>
<script>
	alert("Go To Update Form!");
	window.location.href="A_Member_Update.php";
</script>
<?php
	}
	else
	{
		require("Admin_Session.php");
	}
?>