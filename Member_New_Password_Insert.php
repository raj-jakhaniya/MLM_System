<?php
    extract($_POST);
    require("connection.php");
    session_start();

    if($password==$c_password)
    {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="update member set password='$password' where member_id='{$_SESSION['user_id']}'";
    mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
    alert("Password Changed Successfully!");
    window.location.href="Member_Profile.php";
</script>
<?php
    }
    else
    {
?>
<script>
    alert("Please Enter Correct Password!");
    window.location.href="Member_New_Password.php";
</script>
<?php
    }
?>