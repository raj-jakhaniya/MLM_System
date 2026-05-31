<?php
	/*session_start();
    if(isset($_POST['id']))
	{*/
?>
<?php

	include("connection.php");
	extract($_REQUEST);
	$sql2="delete from kyc where id=$id";
	mysqli_query($link,$sql2)or die(mysqli_error($link));
	$sql="select member_id from member where id=$id";
	$result=mysqli_query($link,$sql)or die(mysqli_error($link));
	$row=mysqli_fetch_assoc($result);
	$document=$row['member_id']."_Document";
    unlink("Member_Kyc_Document/".$document);
	$sql1="delete from levels where id=$id";
	mysqli_query($link,$sql1)or die(mysqli_error($link));
	$sql="delete from member where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Member Data Deleted Successfully!");
	window.location.href="Admin_Member_View.php";
</script>
<?php
	/*}
	else if($_SESSION['role']=='admin')
	{
?>
<script>
	alert("Go To View Page!");
	window.location.href="Admin_Member_View.php";
</script>
<?php
	}
	else
	{
		require("Admin_Session.php");
	}*/
?>