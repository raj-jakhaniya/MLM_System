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
    else if ($_SESSION["role"] == 'member') {
?>
<script>
    alert("Admin Log In Required!");
    window.location.href = "../member/Member_Dashboard.php";
</script>
<?php
    }
?>