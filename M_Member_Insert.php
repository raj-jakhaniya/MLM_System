<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
?>
<?php
    extract($_POST);
    include("connection.php");

    $sposor_id=$_SESSION['user_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "insert into member(member_id,member_name,password,email,mobile,sponsor_id) values('$member_id','$member_name','$password','$email','$mobile','$sposor_id')";
    mysqli_query($link, $sql) or die(mysqli_error($link));

    $sql2="insert into levels(member_id) values('$member_id')";
	mysqli_query($link, $sql2) or die(mysqli_error($link));

    $sql7="insert into kyc(member_id) values('$member_id')";
	mysqli_query($link, $sql7) or die(mysqli_error($link));

    $sql4="select point from member where member_id='$sposor_id'";
    $result = mysqli_query($link, $sql4) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    $t_point=$point;

    $sql="select count(*) as t_members from member where sponsor_id='$sposor_id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    echo $t_members;
    if($t_members>30)
    {
        $sql4= "update levels set level_no=1 where member_id='$sposor_id'";
        mysqli_query($link, $sql4) or die(mysqli_error($link));  
        $sql1= "update member set point=(point+40) where member_id= '$sposor_id'";
        mysqli_query($link, $sql1) or die(mysqli_error($link));  
    }
    else if($t_members>10)
    {
        $sql5= "update levels set level_no=2 where member_id='$sposor_id'";
        mysqli_query($link, $sql5) or die(mysqli_error($link));
        $sql1= "update member set point=(point+20) where member_id= '$sposor_id'";
        mysqli_query($link, $sql1) or die(mysqli_error($link));
    }
    else
    {
        $sql6= "update levels set level_no=3 where member_id='$sposor_id'";
        mysqli_query($link, $sql6) or die(mysqli_error($link));
        $sql1= "update member set point=(point+10) where member_id= '$sposor_id'";
        mysqli_query($link, $sql1) or die(mysqli_error($link));
    }
?>
<script>
    alert("Member Registration Successfully!");
    window.location.href = "Member_View.php";
</script>
<?php
    }
	else if($_SESSION['role']=='member')
	{
?>
<script>
	alert("Go To Registration Form!");
	window.location.href="M_Member_Registration.php";
</script>
<?php
	}
	else
	{
		require("Member_Session.php");
	}
?>