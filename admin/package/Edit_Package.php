
<?php

    include("../connection.php");
    extract($_POST);
    $sql="update packages set package_name='$package_name',price=$price,reward_points=$reward_points where package_id=$package_id";
    mysqli_query($link,$sql)or die(mysqli_error($link));
    
?>
<script>
	alert("Package Data Updated Successfully!");
	window.location.href="View_Package.php";
</script>