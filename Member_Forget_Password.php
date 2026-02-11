<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Member Forget Password</title>
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

/* BODY */
body{
min-height:100vh;
background:var(--bg);
display:flex;
flex-direction:column;
}

/* TOPBAR */
.topbar{
text-align:center;
padding:20px;
color:white;
font-size:26px;
background:#1f2933;
box-shadow:0 2px 10px rgba(0,0,0,0.4);
}

/* CENTER */
.wrapper{
flex:1;
display:flex;
justify-content:center;
align-items:center;
}

/* CARD */
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

/* INPUT */
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
}

.input-group input:focus{
border-color:var(--primary);
background:#fff;
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

<div class="topbar">
MLM System - Member Forget Password
</div>

<div class="wrapper">
<div class="login-box">

<div class="icon">
<i class="fa fa-unlock-keyhole"></i>
</div>

<h2>New Password</h2>

<form method="POST" action="Member_Forget_Password_Insert.php">

<div class="input-group">
<i class="fa fa-id-card"></i>
<input type="text" name="member_id" placeholder="Member ID" required>
</div>

<div class="input-group">
<i class="fa fa-key"></i>
<input type="password" name="pin" placeholder="Last 4-Digit of Mobile No." required>
</div>

<div class="input-group">
<i class="fa fa-lock"></i>
<input type="password" name="password" placeholder="New Password" required>
</div>

<button type="submit" class="login-btn">Change Password</button>

</form>

</div>
</div>

</body>
</html>
