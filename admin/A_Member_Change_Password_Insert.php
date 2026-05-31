<?php
    extract($_POST);
    require("connection.php");
    
    if($password==$c_password)
    {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="update member set password='$password' where member_id='$member_id'";
    mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
    alert("Password Changed Successfully!");
    window.location.href="Admin_Member_View.php";
</script>
<?php
    }
    else
    {
?>
<script>
    alert("Please Enter Correct Password!");
    window.location.href="A_Member_Change_Password.php";
</script>
<?php
    }
?>