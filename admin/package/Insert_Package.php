<?php

    require("../connection.php");

    extract($_POST);

    $sql="insert into packages(package_id,package_name,price,reward_points) values($package_id,'$package_name',$price,$reward_points)";

    mysqli_query($link,$sql) or die(mysqli_error($link));

?>
<script>
    alert("Package Added Successfully!");
    window.location.href="View_Package.php";
</script>