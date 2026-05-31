<?php
    include("connection.php");
    extract($_REQUEST);
    $d_point=$point;
    $sql = "update withdrawals set status='rejected' where id=$id";
    mysqli_query($link, $sql) or die(mysqli_error($link));
    $sql = "select point from member where member_id='$member_id'";
    mysqli_query($link, $sql) or die(mysqli_error($link));
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    $temp_point = $point;
    $sql = "update member set point=$temp_point+$d_point where member_id='$member_id'";
    mysqli_query($link, $sql) or die(mysqli_error($link));
?>
<script>
    alert("Withdraw Request Rejected Successfully!");
    window.location.href = "Admin_Member_Withdrawals_View.php";
</script>