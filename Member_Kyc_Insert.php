<?php

    require("connection.php");
    

    session_start();
    $member_id=$_SESSION['user_id'];

    $filename=$member_id."_Document";//get file name from form
    $tempname=$_FILES["document"]["tmp_name"];//temp file name
    $folder="../admin/Member_Kyc_Document/".$filename;//location
    move_uploaded_file($tempname,$folder);//file move to folder location
   
    $sql="select status from kyc where member_id='$member_id'";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $row=mysqli_fetch_assoc($result);
    extract($row);
    if($status=='rejected')
    {
        $sql="update kyc set status='pending',document='$filename' where member_id='$member_id'"; 
        mysqli_query($link,$sql) or die(mysqli_error($link));
    }
    else if($status=='pending' and $document==NULL)
    {
        $sql="update kyc set status='pending',document='$filename' where member_id='$member_id'"; 
        mysqli_query($link,$sql) or die(mysqli_error($link));   
    }
?>
<script>
    alert("KYC Request Submitted Successfully!");
    window.location.href="Member_Kyc_View.php";
</script>