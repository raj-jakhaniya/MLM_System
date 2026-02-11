<?php
	require("Member_Session.php");
?>
<?php
    session_start();    
    session_unset();
    session_destroy();
?>
<script>
    alert("Logout Successfully!");
    window.location.href="../MLM_System.php";
</script>