<?php
    extract($_POST);
    require("connection.php");
    
    if($password==$c_password)
    {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="update admin set password='$password' where admin_id='$admin_id'";
    mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
    alert("Password Changed Successfully!");
    window.location.href="Admin_View.php";
</script>
<?php
    }
    else
    {
?>
<script>
    alert("Please Enter Correct Password!");
    window.location.href="Admin_Change_Password.php";
</script>
<?php
    }
?>