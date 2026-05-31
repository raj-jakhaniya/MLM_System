<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="delete from wallet where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Wallet Data Deleted Successfully!");
	window.location.href="Admin_Member_Wallet.php";
</script>