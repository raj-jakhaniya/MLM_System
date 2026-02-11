<?php
    require("Member_Session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Member Home</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>

/* RESET */

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

/* ===================== */
/* THEME VARIABLES */
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
}

/* ===================== */
/* CONTENT */
/* ===================== */

.content{
margin-left:240px;
padding:40px;
}

/* ===================== */
/* DASHBOARD GRID */
/* ===================== */

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
gap:25px;
}

.card{
background:var(--card);
padding:35px;
border-radius:12px;
text-align:center;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
transition:0.3s;
}

.card:hover{
transform:translateY(-6px);
}

.card i{
font-size:42px;
color:var(--hover);
margin-bottom:15px;
}

.card a{
display:block;
color:var(--text);
font-size:18px;
text-decoration:none;
font-weight:600;
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

<!-- SIDEBAR -->

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

<!-- TOPBAR -->

<div class="topbar">
MLM System - Member Panel
</div>

<!-- CONTENT -->

<div class="content">

<div class="grid">

<div class="card">
<i class="fa fa-users"></i>
<a href="Member_View.php">View Member</a>
</div>

<div class="card">
<i class="fa fa-user-plus"></i>
<a href="M_Member_Registration.php">Add Member</a>
</div>

<div class="card">
<i class="fa fa-box"></i>
<a href="Buy_Package.php">Buy Package</a>
</div>

<div class="card">
<i class="fa fa-cart-shopping"></i>
<a href="Member_Purchase.php">Purchase History</a>
</div>

<div class="card">
<i class="fa fa-box"></i>
<a href="Buy_Product.php">Buy Product</a>
</div>

<div class="card">
<i class="fa fa-cart-shopping"></i>
<a href="Member_Product_Purchase.php">Product Purchase History</a>
</div>

<div class="card">
<i class="fa fa-hand-holding-dollar"></i>
<a href="Member_Withdrawals_Form.php">Withdraw Point</a>
</div>

<div class="card">
<i class="fa fa-wallet"></i>
<a href="Member_Withdrawals_View.php">Withdraw History</a>
</div>

<div class="card">
<i class="fa fa-coins"></i>
<a href="Member_Wallet.php">Wallet</a>
</div>

<div class="card">
<i class="fa fa-id-card"></i>
<a href="Member_Kyc_View.php">E-KYC</a>
</div>

<div class="card">
<i class="fa fa-user"></i>
<a href="Member_Profile.php">My Profile</a>
</div>

</div>

</div>

</body>
</html>
