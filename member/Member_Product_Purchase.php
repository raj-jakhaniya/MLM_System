<?php
require("Member_Session.php");
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Purchase History</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

/* THEME VARIABLES */
:root{
--bg:#f3f4f6;
--sidebar:#1f2933;
--topbar:#1f2933;
--card:#ffffff;
--text:#111827;
--link:#cbd5e1;
--hover:#2563eb;
}

/* BODY */
body{
background:var(--bg);
}

/* SIDEBAR */
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

/* TOPBAR */
.topbar{
margin-left:240px;
background:var(--topbar);
color:white;
padding:18px 25px;
font-size:22px;
}

/* CONTENT */
.content{
margin-left:240px;
padding:40px;
}

/* CARD */
.card{
background:var(--card);
padding:30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
.title{
background:var(--hover);
color:white;
padding:15px;
border-radius:10px;
text-align:center;
font-size:26px;
margin-bottom:25px;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:12px;
text-align:center;
}

th{
background:#1f2933;
color:white;
font-size:16px;
}

tr:nth-child(even){
background:#f1f5f9;
}

tr:hover{
background:#dbeafe;
}

/* RESPONSIVE */
@media(max-width:768px){
.sidebar{width:200px;}
.topbar,.content{margin-left:200px;}
}

@media(max-width:576px){
.sidebar{position:relative;width:100%;height:auto;}
.topbar,.content{margin-left:0;}
table{font-size:14px;}
}

/* ADMIN STYLE PAGE HEADING */

.page-title{
background:#1f2933;
color:white;
padding:18px;
border-radius:10px;
text-align:center;
font-size:28px;
margin-bottom:25px;
letter-spacing:1px;
box-shadow:0 5px 15px rgba(0,0,0,0.3);
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

<div class="card">

<h2 class="page-title">
<i class="fa fa-cart-shopping"></i> Product Purchase History
</h2>

<table>

<tr>
<th>Member ID</th>
<th>Product ID</th>
<th>Price</th>
<th>Date & Time</th>
</tr>

<?php
$sql="SELECT * FROM products_purchases";
$result=mysqli_query($link,$sql);

while($row=mysqli_fetch_assoc($result)){
if($row['member_id']==$_SESSION['user_id']){
?>

<tr>
<td><?php echo $row['member_id']; ?></td>
<td><?php echo $row['product_id']; ?></td>
<td>₹ <?php echo $row['price']; ?></td>
<td><?php echo $row['date_and_time']; ?></td>
</tr>

<?php
}
}
?>

</table>

</div>

</div>

</body>
</html>
