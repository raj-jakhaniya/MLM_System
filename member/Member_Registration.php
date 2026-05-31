<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Member Registration</title>
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

/* CENTER AREA */
.wrapper{
flex:1;
display:flex;
justify-content:center;
align-items:center;
}

/* FORM CARD */
.form-box{
width:520px;
background:var(--card);
padding:50px;
border-radius:14px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
.form-box h2{
text-align:center;
margin-bottom:30px;
color:var(--text);
font-size:28px;
}

/* INPUT GROUP */
.input-group{
position:relative;
margin-bottom:20px;
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
padding:14px 14px 14px 45px;
border-radius:10px;
border:1px solid #cbd5e1;
font-size:16px;
outline:none;
background:#f9fafb;
}

.input-group input:focus{
border-color:var(--primary);
background:white;
}

/* BUTTON */
.submit-btn{
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

.submit-btn:hover{
background:#1e40af;
}

/* MOBILE */
@media(max-width:480px){
.form-box{
width:90%;
padding:35px;
}
}

</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
MLM System - Member Registration
</div>

<!-- CENTER -->
<div class="wrapper">

<div class="form-box">

<h2>Member Registration Form</h2>

<form method="POST" action="Member_Insert.php">

<div class="input-group">
<i class="fa fa-id-card"></i>
<input type="text" name="member_id" placeholder="Member ID" required>
</div>

<div class="input-group">
<i class="fa fa-user"></i>
<input type="text" name="member_name" placeholder="Member Name" required>
</div>

<div class="input-group">
<i class="fa fa-lock"></i>
<input type="password" name="password" placeholder="Password" required>
</div>

<div class="input-group">
<i class="fa fa-envelope"></i>
<input type="email" name="email" placeholder="Email Address" required>
</div>

<div class="input-group">
<i class="fa fa-phone"></i>
<input type="text" name="mobile" placeholder="Mobile Number" required>
</div>

<button type="submit" class="submit-btn">Register Member</button>

</form>

</div>
</div>

</body>
</html>
