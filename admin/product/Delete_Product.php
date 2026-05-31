<?php
	include("../connection.php");
	extract($_REQUEST);
	$sql="select product_image from products where product_id=$product_id";
    $result=mysqli_query($link,$sql)or die(mysqli_error($link));
    $row=mysqli_fetch_assoc($result);
    extract($row);
    unlink("Product_Image/"."$product_image");
	$sql="delete from products where product_id=$product_id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Product Data Deleted Successfully!");
	window.location.href="View_Product.php";
</script>