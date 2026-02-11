<?php
require("Admin_Session.php");
include("connection.php");

extract($_REQUEST);

$sql = "SELECT * FROM kyc WHERE id=$id";
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);
extract($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KYC Verification</title>

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

/* BODY */
html,body{
height:100%;
background:var(--bg);
overflow:hidden;
}

/* SIDEBAR */
.sidebar{
position:fixed;
width:240px;
height:100%;
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
height:65px;
display:flex;
align-items:center;
}

/* CONTENT */
.content{
margin-left:240px;
height:calc(100% - 65px);
display:flex;
align-items:center;
justify-content:center;
}

/* CARD */
.card{
background:var(--card);
width:500px;
padding:40px;
border-radius:14px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
.card h2{
background:#1f2933;
color:white;
padding:14px;
text-align:center;
border-radius:10px;
margin-bottom:25px;
font-size:26px;
}

/* FORM GROUP */
.form-group{
margin-bottom:18px;
}

.form-group label{
display:block;
margin-bottom:6px;
font-weight:600;
color:var(--text);
}

.form-group input{
width:100%;
padding:12px;
border-radius:8px;
border:1px solid #cbd5e1;
font-size:15px;
}

/* RADIO */
.radio-group{
display:flex;
gap:25px;
align-items:center;
flex-wrap:wrap;
margin:15px 0;
}

.radio-group label{
display:flex;
align-items:center;
gap:6px;
background:#f9fafb;
padding:8px 14px;
border-radius:8px;
border:1px solid #cbd5e1;
cursor:pointer;
font-weight:500;
}

.radio-group input{
accent-color:#2563eb;
transform:scale(1.1);
}

/* BUTTONS */
.btn-view{
display:inline-block;
background:#2563eb;
color:white;
padding:10px 16px;
border-radius:8px;
text-decoration:none;
font-weight:600;
}

.btn-view:hover{
background:#1e40af;
}

.btn-submit{
width:100%;
padding:14px;
border:none;
border-radius:10px;
background:#2563eb;
color:white;
font-size:17px;
font-weight:bold;
cursor:pointer;
margin-top:15px;
}

.btn-submit:hover{
background:#1e40af;
}

/* RESPONSIVE */
@media(max-width:768px){
.sidebar{width:200px;}
.topbar,.content{margin-left:200px;}
}

@media(max-width:576px){
html,body{overflow:auto;}
.sidebar{position:relative;width:100%;height:auto;}
.topbar,.content{margin-left:0;}
.content{padding:30px;}
.card{width:95%;}
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

<h2>KYC Verification</h2>

<form method="POST" action="Admin_Member_Kyc_Edit.php">

<div class="form-group">
<label>Member ID</label>
<input type="text" name="member_id" value="<?php echo $member_id; ?>" readonly>
</div>

<div class="form-group">
<label>Status</label>

<div class="radio-group">

<label>
<input type="radio" name="status" value="pending" <?php if($status=="pending") echo "checked"; ?>>
<span>Pending</span>
</label>

<label>
<input type="radio" name="status" value="approved" <?php if($status=="approved") echo "checked"; ?>>
<span>Approved</span>
</label>

<label>
<input type="radio" name="status" value="rejected" <?php if($status=="rejected") echo "checked"; ?>>
<span>Rejected</span>
</label>

</div>
</div>

<div class="form-group">
<label>Document</label>
<a class="btn-view" href="Member_Kyc_Document/<?php echo $document; ?>" target="_blank">
<i class="fa fa-eye"></i> View Document
</a>
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>">

<button type="submit" class="btn-submit">
<i class="fa fa-circle-check"></i> Update Status
</button>

</form>

</div>

</div>

</body>
</html>
