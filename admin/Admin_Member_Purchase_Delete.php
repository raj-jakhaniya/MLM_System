<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="delete from purchases where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Purchase History Data Deleted Successfully!");
	window.location.href="Admin_Member_Purchase.php";
</script>