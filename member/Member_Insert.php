<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
?>
<?php

    extract($_POST);
    include("connection.php");
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "insert into member(member_id,member_name,password,email,mobile) values('$member_id','$member_name','$password','$email','$mobile')";
    mysqli_query($link, $sql) or die(mysqli_error($link));

	$sql1="insert into levels(member_id) values('$member_id')";
	mysqli_query($link, $sql1) or die(mysqli_error($link));

	$sql2="insert into kyc(member_id) values('$member_id')";
	mysqli_query($link, $sql2) or die(mysqli_error($link));

?>
<script>
    alert("Member Registration Successfully!");
    window.location.href = "../Website.php";
</script>
<?php
    }
	else if($_SESSION['role']=='member')
	{
?>
<script>
	alert("Logout First and Go to Member Registration Page!");
	window.location.href="Member_Dashboard.php";
</script>
<?php
	}
	else
	{
		require("Member_Session.php");
	}
?>