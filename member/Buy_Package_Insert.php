<?php

    require("connection.php");

    extract($_POST);
    session_start();
    $member_id=$_SESSION['user_id'];

    $sql="select * from packages where package_id=$package";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));   
    $row=mysqli_fetch_assoc($result);
    extract($row);
    if($package==$package_id)
    {
        $amount=$price;
        $p_package_id=$package_id;
    }
    $sql="insert into purchases(member_id,package_id,amount,upi_id) values('$member_id',$p_package_id,$amount,'$upi_id');";
    mysqli_query($link,$sql) or die(mysqli_error($link));

?>
<script>
    alert("Package Buy Request Send Successfully!");
    window.location.href="Buy_Package.php";
</script>