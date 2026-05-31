<?php
require("Admin_Session.php");
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Point Withdraw History</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

/* THEME */
:root{
--bg:#f3f4f6;
--sidebar:#1f2933;
--topbar:#1f2933;
--card:#ffffff;
--text:#111827;
--link:#cbd5e1;
--hover:#2563eb;
}

body{background:var(--bg);}

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

.sidebar a i{margin-right:10px;}

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

/* TABLE */
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

/* BUTTONS */
.btn{
padding:6px 18px;
border-radius:6px;
color:white;
text-decoration:none;
font-weight:600;
display:inline-block;
}

.approve{background:#16a34a;}
.reject{background:#dc2626;}
.delete{background:#dc2626;}

.approve:hover{background:#15803d;}
.reject:hover{background:#b91c1c;}
.delete:hover{background:#7f1d1d;}

.badge-green{
background:#16a34a;
color:white;
padding:6px 18px;
border-radius:6px;
font-weight:600;
}

.badge-red{
background:#dc2626;
color:white;
padding:6px 18px;
border-radius:6px;
font-weight:600;
}

/* RESPONSIVE */
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

.disabled{
background:#9ca3af !important;
pointer-events:none;
cursor:not-allowed;
opacity:0.6;
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

<h2 class="page-title">Point Withdraw History</h2>

<table>

<tr>
<th>Member ID</th>
<th>Point</th>
<th>Amount</th>
<th>Status</th>
<th>Approve</th>
<th>Reject</th>
<th>Delete</th>
</tr>

<?php
$sql="SELECT * FROM withdrawals";
$result=mysqli_query($link,$sql);

while($row=mysqli_fetch_assoc($result)){
extract($row);
?>

<tr>

<td><?php echo $member_id; ?></td>
<td><?php echo $point; ?></td>
<td><?php echo $amount; ?></td>
<td><?php echo $status; ?></td>

<?php if($status=='pending'){ ?>

<td>
<a class="btn approve" 
href="Admin_Member_Withdrawals_Approve.php?id=<?php echo $id; ?>&member_id=<?php echo $member_id; ?>&amount=<?php echo $amount; ?>">
Approve
</a>
</td>

<td>
<a class="btn reject" 
href="Admin_Member_Withdrawals_Reject.php?id=<?php echo $id; ?>&member_id=<?php echo $member_id; ?>&point=<?php echo $point; ?>">
Reject
</a>
</td>

<?php } else { ?>
<td>
<a class="btn approve disabled">Approve</a>
</td>

<td>
<a class="btn reject disabled">Reject</a>
</td>


<?php } ?>

<td>
<a class="btn delete" href="Admin_Member_Withdrawals_Delete.php?id=<?php echo $id; ?>">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
