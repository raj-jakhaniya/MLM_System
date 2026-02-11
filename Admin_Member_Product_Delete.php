<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="delete from products_purchases where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Product Purchase History Data Deleted Successfully!");
	window.location.href="Admin_Member_Product_Purchase.php";
</script>