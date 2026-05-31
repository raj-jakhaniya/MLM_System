<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="update purchases set status='approved' where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));

   
    $sql="select point from member where member_id='$member_id'";
        $result=mysqli_query($link,$sql)or die(mysqli_error($link));
        $row=mysqli_fetch_assoc($result);
        extract($row);
        $t_point=$point;
        $sql="select * from packages where package_id=$package_id";
        $result=mysqli_query($link,$sql)or die(mysqli_error($link));
        $row=mysqli_fetch_assoc($result);
        extract($row);
        $t_r_points=$reward_points;
        $sql="update member set point=$t_point+$t_r_points where member_id='$member_id'";
        mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
	alert("Purchase Request Approved Successfully!");
	window.location.href="Admin_Member_Purchase.php";
</script>