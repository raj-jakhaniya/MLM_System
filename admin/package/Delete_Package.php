<?php
	include("../connection.php");
	extract($_REQUEST);
	$sql="delete from packages where package_id=$package_id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Package Data Deleted Successfully!");
	window.location.href="View_Package.php";
</script>