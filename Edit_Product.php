
<?php

    require("../connection.php");
    extract($_POST);
    $sql="update products set product_name='$product_name',price=$price,description='$description' where product_id=$product_id";
    mysqli_query($link,$sql)or die(mysqli_error($link));

    $sql="select product_image from products where product_id=$product_id";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));

    $row=mysqli_fetch_assoc($result);
    extract($row);
    $oldphoto="Product_Image/$product_image";

    if($_FILES['product_new_image']['error']===0){
        unlink("$oldphoto");
        $product_new_image=$product_id."_".$_FILES['product_new_image']['name'];
        move_uploaded_file($_FILES['product_new_image']['tmp_name'],"Product_Image/$product_new_image");

        $sql="update products set product_image='$product_new_image' where product_id=$product_id";
        mysqli_query($link,$sql) or die(mysqli_error($link));
    }
    else if($_FILES['product_new_image']['error']===4){
        $sql="update products set product_image='$product_image' where product_id=$product_id";
        mysqli_query($link,$sql) or die(mysqli_error($link));
    }
?>
<script>
	alert("Product Data Updated Successfully!");
	window.location.href="View_Product.php";
</script>