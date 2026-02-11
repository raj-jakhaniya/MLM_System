<?php
    require("Admin_Session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Home</title>

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

.card.center{
font-size:22px;
font-weight:bold;
color:var(--text);
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

<a href="Admin_Home.php"><i class="fa fa-house"></i>Home</a>
<a href="Admin_Member_View.php"><i class="fa fa-users"></i>View Member</a>
<a href="Admin_View.php"><i class="fa fa-user-shield"></i>View Admin</a>
<a href="Admin_Registration.php"><i class="fa fa-user-plus"></i>Add Admin</a>
<a href="package/View_Package.php"><i class="fa fa-box"></i>Manage Package</a>
<a href="Admin_Member_Purchase.php"><i class="fa fa-cart-shopping"></i>Package Purchase History</a>
<a href="product/View_Product.php"><i class="fa fa-box"></i>Manage Product</a>
<a href="Admin_Member_Product_Purchase.php"><i class="fa fa-cart-shopping"></i>Product Purchase History</a>
<a href="Admin_Member_Withdrawals_View.php"><i class="fa fa-wallet"></i>Point Withdraw History</a>
<a href="Admin_Member_Wallet.php"><i class="fa fa-coins"></i>Member Wallet</a>
<a href="Admin_Member_Kyc_View.php"><i class="fa fa-id-card"></i>Member KYC</a>
<a href="Admin_Logout.php"><i class="fa fa-right-from-bracket"></i>Logout</a>
</div>

<!-- TOPBAR -->

<div class="topbar">
MLM System - Admin Panel
</div>

<!-- CONTENT -->

<div class="content">

<div class="grid">

<div class="card">
<i class="fa fa-users"></i>
<a href="Admin_Member_View.php">View Member</a>
</div>

<div class="card">
<i class="fa fa-user-shield"></i>
<a href="Admin_View.php">View Admin</a>
</div>

<div class="card">
<i class="fa fa-user-plus"></i>
<a href="Admin_Registration.php">Add Admin</a>
</div>

<div class="card">
<i class="fa fa-box"></i>
<a href="package/View_Package.php">Manage Package</a>
</div>

<div class="card">
<i class="fa fa-cart-shopping"></i>
<a href="Admin_Member_Purchase.php">Package Purchase History</a>
</div>

<div class="card">
<i class="fa fa-box"></i>
<a href="product/View_Product.php">Manage Product</a>
</div>

<div class="card">
<i class="fa fa-cart-shopping"></i>
<a href="Admin_Member_Product_Purchase.php">Product Purchase History</a>
</div>

<div class="card">
<i class="fa fa-wallet"></i>
<a href="Admin_Member_Withdrawals_View.php">Point Withdraw History</a>
</div>

<div class="card">
<i class="fa fa-coins"></i>
<a href="Admin_Member_Wallet.php">Member Wallet</a>
</div>

<div class="card">
<i class="fa fa-id-card"></i>
<a href="Admin_Member_Kyc_View.php">Member KYC</a>
</div>

</div>

</div>

</body>
</html>
