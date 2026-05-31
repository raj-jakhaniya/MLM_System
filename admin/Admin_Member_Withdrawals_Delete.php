<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="delete from withdrawals where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Withdraw History Data Deleted Successfully!");
	window.location.href="Admin_Member_Withdrawals_View.php";
</script>