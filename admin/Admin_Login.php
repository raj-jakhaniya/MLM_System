<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

/* THEME (SAME AS ADMIN REGISTRATION) */
:root{
--bg:#f3f4f6;
--card:#ffffff;
--text:#111827;
--primary:#2563eb;
}

/* BACKGROUND */
body{
min-height:100vh;
background:var(--bg);
display:flex;
flex-direction:column;
}

/* TOP BAR */
.topbar{
text-align:center;
padding:20px;
color:white;
font-size:26px;
background:#1f2933;
box-shadow:0 2px 10px rgba(0,0,0,0.4);
}

/* CENTER AREA */
.wrapper{
flex:1;
display:flex;
justify-content:center;
align-items:center;
}

/* LOGIN CARD */
.login-box{
width:480px;              /* increased width */
background:var(--card);
padding:65px;             /* increased inner spacing */
border-radius:14px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}


/* ICON */
.icon{
text-align:center;
font-size:60px;
color:var(--primary);
margin-bottom:10px;
}

/* TITLE */
.login-box h2{
text-align:center;
margin-bottom:30px;
color:var(--text);
font-size:28px;
}

/* INPUT GROUP */
.input-group{
position:relative;
margin-bottom:22px;
}

.input-group i{
position:absolute;
top:50%;
left:15px;
transform:translateY(-50%);
color:var(--primary);
font-size:18px;
pointer-events:none;
}


.input-group input{
width:100%;
padding:15px 15px 15px 48px;
border-radius:10px;
border:1px solid #cbd5e1;
font-size:17px;
outline:none;
background:#f9fafb;
color:#111827;
}

.input-group input:focus{
border-color:var(--primary);
background:white;
}

/* BUTTON */
.login-btn{
width:100%;
padding:12px;
border:none;
border-radius:10px;
background:var(--primary);
color:white;
font-size:17px;
font-weight:600;
cursor:pointer;
}

.login-btn:hover{
background:#1e40af;
}

/* MOBILE */
@media(max-width:480px){
.login-box{
width:90%;
}
}

</style>

</head>

<body>

<div class="topbar">
MLM System - Admin Login
</div>

<div class="wrapper">
<div class="login-box">

<div class="icon">
<i class="fa fa-user-shield"></i>
</div>

<?php
session_start();

/* ===============================
   ORIGINAL DATABASE CODE (COMMENTED)
==================================*/

require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = mysqli_real_escape_string($link, $_POST['admin_id']);
    $password = $_POST['password'];

    $sql = "select password from admin where admin_id='$admin_id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) 
    {
        $_SESSION['user_id'] = $admin_id;
        $_SESSION['role']='admin';
        header("Location:Admin_Dashboard.php");
    } 
    else {
        echo "<script>alert('Invalid Admin ID or Password!');</script>";
        echo "<script>window.location.href='Admin_Login.php';</script>";
    }
    exit();
}

?>

<h2>Admin Login</h2>

<form action="" method="POST">

<div class="input-group">
<i class="fa fa-user-shield"></i>
<input type="text" name="admin_id" placeholder="Admin ID" required>
</div>

<div class="input-group">
<i class="fa fa-lock"></i>
<input type="password" name="password" placeholder="Password" required>
</div>

<button type="submit" class="login-btn">Login</button>

</form>

</div>
</div>

</body>
</html>
