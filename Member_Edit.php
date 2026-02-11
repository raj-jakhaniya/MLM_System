<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
?>
<?php

    $link=mysqli_connect("localhost","root","","project");
    extract($_POST);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql="update member set member_id='$member_id',member_name='$member_name',email='$email',mobile='$mobile' where id=$id";
    mysqli_query($link,$sql)or die(mysqli_error($link));

?>
<script>
	alert("Member Data Updated Successfully!");
	window.location.href="Member_View.php";
</script>
<?php
    }
	else if($_SESSION['role']=='member')
	{
?>
<script>
	alert("Go To Update Form!");
	window.location.href="Member_Update.php";
</script>
<?php
	}
	else
	{
		require("Member_Session.php");
	}
?>