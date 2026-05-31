<?php

    require("connection.php");
    extract($_POST);

    $sql="update kyc set status='$status' where id=$id";
    mysqli_query($link,$sql)or die(mysqli_error($link));;
    if($status=='rejected')
    {
        $document="$member_id"."_Document";
        unlink("Member_Kyc_Document/".$document);
        $sql="update kyc set status='$status',document='NULL' where id=$id";
        mysqli_query($link,$sql)or die(mysqli_error($link));;
    }

?>
<script>
    alert("Member KYC Status Updated Successfully!");
    window.location.href="Admin_Member_Kyc_View.php";
</script>