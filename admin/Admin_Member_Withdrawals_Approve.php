<?php
	include("connection.php");
	extract($_REQUEST);
	$sql="update withdrawals set status='approved' where id=$id";
    mysqli_query($link,$sql)or die(mysqli_error($link));
    $sql1="insert into wallet(member_id,amount,type,description) values('$member_id',$amount,'credit','point withdraw')";
    mysqli_query($link,$sql1)or die(mysqli_error($link));
?>
<script>
	alert("Withdraw Request Approved Successfully!");
	window.location.href="Admin_Member_Withdrawals_View.php";
</script>