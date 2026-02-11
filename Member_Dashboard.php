<?php
    require("Member_Session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Member Dashboard</title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

/* ===================== */
/* LIGHT THEME VARIABLES */
/* ===================== */

:root{
    --bg:#f3f4f6;
    --sidebar:#1f2933;
    --topbar:#1f2933;
    --card:#ffffff;
    --text:#111827;
    --link:#cbd5e1;
    --hover:#2563eb;
}

/* ===================== */
/* DARK THEME VARIABLES */
/* ===================== */

body.dark{
    --bg:#0f172a;
    --sidebar:#020617;
    --topbar:#020617;
    --card:#020617;
    --text:#f9fafb;
    --link:#9ca3af;
    --hover:#38bdf8;
}

body{
    background:var(--bg);
}

/* ===================== */
/* SIDEBAR */
/* ===================== */

.sidebar{
    position:fixed;
    width:240px;
    height:100vh;
    background:var(--sidebar);
    padding-top:25px;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:var(--link);
    padding:14px 20px;
    text-decoration:none;
}

.sidebar a i{
    margin-right:10px;
}

.sidebar a:hover{
    background:var(--hover);
    color:white;
}

/* ===================== */
/* TOPBAR */
/* ===================== */

.topbar{
    margin-left:240px;
    background:var(--topbar);
    color:white;
    padding:18px 25px;
    font-size:22px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* ===================== */
/* TOGGLE BUTTON */
/* ===================== */

.theme-btn{
    background:none;
    border:none;
    color:white;
    font-size:22px;
    cursor:pointer;
}

/* ===================== */
/* CONTENT */
/* ===================== */

.content{
    margin-left:240px;
    padding:40px;
}

.box{
    background:var(--card);
    color:var(--text);
    padding:50px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    font-size:26px;
    text-align:center;
}

.box::before{
    content:"👤";
    font-size:60px;
    display:block;
    margin-bottom:15px;
}

/* ===================== */
/* RESPONSIVE */
/* ===================== */

@media(max-width:768px){
.sidebar{width:200px;}
.topbar,.content{margin-left:200px;}
}

@media(max-width:576px){
.sidebar{position:relative;width:100%;height:auto;}
.topbar,.content{margin-left:0;}
}

</style>
</head>

<body>

<!-- ===================== -->
<!-- SIDEBAR -->
<!-- ===================== -->

<div class="sidebar">
<h2>Dashboard</h2>

<a href="Member_Home.php"><i class="fa fa-house"></i>Home</a>
<a href="Member_View.php"><i class="fa fa-users"></i>View Member</a>
<a href="M_Member_Registration.php"><i class="fa fa-user-plus"></i>Add Member</a>
<a href="Buy_Package.php"><i class="fa fa-box"></i>Buy Package</a>
<a href="Member_Purchase.php"><i class="fa fa-cart-shopping"></i>Purchase History</a>
<a href="Buy_Product.php" class="active"><i class="fa fa-box"></i>Buy Product</a>
<a href="Member_Product_Purchase.php"><i class="fa fa-cart-shopping"></i>Product Purchase History</a>
<a href="Member_Withdrawals_Form.php"><i class="fa fa-hand-holding-dollar"></i>Withdraw Point</a>
<a href="Member_Withdrawals_View.php"><i class="fa fa-wallet"></i>Withdraw History</a>
<a href="Member_Wallet.php"><i class="fa fa-coins"></i>Wallet</a>
<a href="Member_Kyc_View.php"><i class="fa fa-id-card"></i>E-KYC</a>
<a href="Member_Profile.php"><i class="fa fa-user"></i>My Profile</a>
<a href="Member_Logout.php"><i class="fa fa-right-from-bracket"></i>Logout</a>

</div>

<!-- ===================== -->
<!-- TOPBAR -->
<!-- ===================== -->

<div class="topbar">
<span>MLM System - Member Panel</span>

<button class="theme-btn" onclick="toggleTheme()">
<i id="themeIcon" class="fa fa-moon"></i>
</button>
</div>

<!-- ===================== -->
<!-- CONTENT -->
<!-- ===================== -->

<div class="content">
<div class="box">
Welcome To Your Dashboard!
</div>
</div>

<!-- ===================== -->
<!-- JS -->
<!-- ===================== -->

<script>

if(localStorage.getItem("theme")==="dark"){
document.body.classList.add("dark");
document.getElementById("themeIcon").className="fa fa-sun";
}

function toggleTheme(){
document.body.classList.toggle("dark");

if(document.body.classList.contains("dark")){
localStorage.setItem("theme","dark");
document.getElementById("themeIcon").className="fa fa-sun";
}else{
localStorage.setItem("theme","light");
document.getElementById("themeIcon").className="fa fa-moon";
}
}

</script>

</body>
</html>
