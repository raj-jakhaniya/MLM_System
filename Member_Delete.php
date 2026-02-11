<?php
	session_start();
    if(isset($_POST['id']))
	{
?>
<?php
	include("connection.php");
	extract($_REQUEST);	
	$temp_id=$_SESSION['user_id'];

	$sql2="delete from kyc where id=$id";
	mysqli_query($link,$sql2)or die(mysqli_error($link));

	$sql1="delete from levels where id=$id";
	mysqli_query($link,$sql1)or die(mysqli_error($link));

	$sql="delete from member where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));
	
?>
<script>
	alert("Member Data Deleted Successfully!");
	window.location.href="Member_View.php";
</script>
<?php
	}
	else if($_SESSION['role']=='member')
	{
?>
<script>
	alert("Go To View Page!");
	window.location.href="Member_View.php";
</script>
<?php
	}
	else
	{
		require("Member_Session.php");
	}
?>
<!---------------------------------------------------------------------------------->
<?php
    //require("Member_Session.php");
?>
<?php
	/*include("connection.php");
	extract($_REQUEST);	
	$sql="delete from member where id=$id";
	mysqli_query($link,$sql)or die(mysqli_error($link));*/
?>
<!--<script>
	alert("Member Data Deleted Successfully!");
	window.location.href="Member_View.php";
</script>-->