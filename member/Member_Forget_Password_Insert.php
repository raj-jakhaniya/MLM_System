<?php
    require("connection.php");
    extract($_POST);

    $sql="select substr(mobile,-4,4) as m_pin from member where member_id='$member_id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    extract($row);
    echo $pin;
    if($m_pin==$pin)
    {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql="update member set password='$password' where member_id='$member_id'";
        mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script>
    alert("Password Changed Successfully!");
    window.location.href="Member_Login.php";
</script>
<?php
    }
    else
    {
?>
<script>
    alert("Invalid Member ID or Pin!");
    window.location.href="Member_Forget_Password.php";
</script>
<?php
    }
?>