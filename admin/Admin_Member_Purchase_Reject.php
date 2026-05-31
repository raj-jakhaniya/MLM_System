<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="update purchases set status='rejected' where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Purchase Request Rejected Successfully!");
	window.location.href="Admin_Member_Purchase.php";
</script>