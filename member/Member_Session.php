<?php
    session_start();
    if (!(isset(($_SESSION["user_id"])))) {
?>
<script>
    alert("Log In Required!");
    window.location.href = "../MLM_System.php";
</script>
    
<?php
    }
    else if ($_SESSION["role"] == 'admin') {
?>
<script>
    alert("Member Log In Required!");
    window.location.href = "../admin/Admin_Dashboard.php";
</script>
<?php
    }
?>