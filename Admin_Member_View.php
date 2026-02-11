<?php
require("Admin_Session.php");
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Member Data</title>

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
/* CARD */
/* ===================== */

.card{
background:var(--card);
padding:30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* ===================== */
/* TABLE */
/* ===================== */

h2{
text-align:center;
margin-bottom:20px;
color:var(--text);
}

table{
width:100%;
border-collapse:collapse;
}

th{
background:#333;
color:white;
padding:12px;
}

td{
background:#f9fafb;
padding:10px;
text-align:center;
}

tr:hover td{
background:#e5e7eb;
}

/* ===================== */
/* BUTTONS */
/* ===================== */

.btn{
padding:6px 18px;
border-radius:6px;
color:white;
text-decoration:none;
font-weight:600;
}

.edit{background:#2563eb;}
.delete{background:#dc2626;}

.edit:hover{background:#1e40af;}
.delete:hover{background:#991b1b;}

@media(max-width:768px){
.sidebar{width:200px;}
.topbar,.content{margin-left:200px;}
}

@media(max-width:576px){
.sidebar{position:relative;width:100%;height:auto;}
.topbar,.content{margin-left:0;}
}
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

<div class="card">

<h2 class="page-title">Member Data</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Points</th>
<th>Sponsor</th>
<th>Status</th>
<th>Level</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
$sql="SELECT * FROM member";
$result=mysqli_query($link,$sql);

$sql1="SELECT * FROM levels";
$result1=mysqli_query($link,$sql1);

while($row=mysqli_fetch_assoc($result) and $row1=mysqli_fetch_assoc($result1)){
extract($row);
extract($row1);
?>

<tr>
<td><?php echo $member_id; ?></td>
<td><?php echo $member_name; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $mobile; ?></td>
<td><?php echo $point; ?></td>

<?php
if($sponsor_id!='NULL'){
echo "<td>$sponsor_id</td>";
}else{
echo "<td>-</td>";
}
?>

<td><?php echo $status; ?></td>
<td><?php echo $level_no; ?></td>

<td>
<a class="btn edit" href="A_Member_Update.php?id=<?php echo $id; ?>">Edit</a>
</td>

<td>
<a class="btn delete" href="A_Member_Delete.php?id=<?php echo $id; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
