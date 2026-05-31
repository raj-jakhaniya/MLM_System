<?php

    require("../connection.php");

    extract($_POST);

    $filename=$product_id."_".$_FILES["product_image"]["name"];//get file name from form
    $tempname=$_FILES["product_image"]["tmp_name"];//temp file name
    $folder="Product_Image/".$filename;//location
    move_uploaded_file($tempname,$folder);//file move to folder location
    $sql="insert into products(product_id,product_name,price,description,product_image) values($product_id,'$product_name',$price,'$description','$filename')";

    mysqli_query($link,$sql) or die(mysqli_error($link));

?>
<script>
    alert("Product Added Successfully!");
    window.location.href="View_Product.php";
</script>