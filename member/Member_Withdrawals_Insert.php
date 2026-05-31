<?php

    require("connection.php");

    session_start();
    $sql="select point from member where member_id='{$_SESSION['user_id']}'";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $row=mysqli_fetch_assoc($result);
    extract($row);
    if($_POST['point']>$point)
    {
?>
<script>
    alert("Insufficient Points!");
    window.location.href="Member_Withdrawals_Form.php";
</script>
<?php
    }
    else
    {
        $amount=$point;
        $sql="insert into withdrawals(member_id,point,amount) values('{$_SESSION['user_id']}',{$_POST['point']},$amount)";
        mysqli_query($link,$sql) or die(mysqli_error($link));  
        $sql="update member set point=$point-{$_POST['point']} where member_id='{$_SESSION['user_id']}'";
        mysqli_query($link,$sql) or die(mysqli_error($link));
?>
<script>
    alert("Withdrawal Request Send Successfully!");
    window.location.href="Member_Withdrawals_View.php";
</script>
<?php
    }
?>