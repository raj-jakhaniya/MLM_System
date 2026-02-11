<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Member Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

/* THEME */
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
width:480px;
background:var(--card);
padding:65px;
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
font-size:16px;
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

/* FORGOT */
.forgot{
text-align:right;
margin-bottom:20px;
}

.forgot a{
text-decoration:none;
color:var(--primary);
font-weight:600;
}

.forgot a:hover{
color:#1e40af;
}

/* BUTTON */
.login-btn{
width:100%;
padding:14px;
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
padding:40px;
}
}

</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
MLM System - Member Login
</div>

<!-- CENTER -->
<div class="wrapper">
<div class="login-box">

<div class="icon">
<i class="fa fa-user"></i>
</div>

<?php
session_start();
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $member_id = mysqli_real_escape_string($link, $_POST['member_id']);
    $password = $_POST['password'];

    $sql="select status from member where member_id='$member_id'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $status=$row['status'];

    $sql = "select password from member where member_id='$member_id'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {

        if($status=='deactive'){
            echo "<script>alert('Inactive Member Account! Please Contact Admin!');</script>";
            echo "<script>window.location.href='Member_Login.php';</script>";
        }
        else{
            $_SESSION['user_id']=$member_id;
            $_SESSION['role']='member';
            header("Location:Member_Dashboard.php");
        }
    }
    else{
        echo "<script>alert('Invalid Member ID or Password!');</script>";
        echo "<script>window.location.href='Member_Login.php';</script>";
    }
    exit();
}
?>

<h2>Member Login</h2>

<form method="POST">

<div class="input-group">
<i class="fa fa-id-card"></i>
<input type="text" name="member_id" placeholder="Member ID" required>
</div>

<div class="input-group">
<i class="fa fa-lock"></i>
<input type="password" name="password" placeholder="Password" required>
</div>

<div class="forgot">
<a href="Member_Forget_Password.php">Forgot Password?</a>
</div>

<button type="submit" class="login-btn">Login</button>

</form>

</div>
</div>

</body>
</html>
