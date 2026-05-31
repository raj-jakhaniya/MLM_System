<?php
require("Admin_Session.php");

include("connection.php");
extract($_GET);
$sql = "select * from admin where id=$id";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);
extract($row);
$_SESSION['temp_id']=$admin_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Edit</title>

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
overflow:hidden;
background:var(--bg);
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

/* FORM BOX */
.form-box{
background:var(--card);
width:500px;
padding:40px;
border-radius:14px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
.form-box h2{
background:#1f2933;
color:white;
padding:14px;
text-align:center;
border-radius:10px;
margin-bottom:25px;
font-size:26px;
}

/* INPUT */
.input-group{
position:relative;
margin-bottom:18px;
}

.input-group i{
position:absolute;
top:14px;
left:14px;
color:#2563eb;
font-size:18px;
}

.input-group input{
width:100%;
padding:14px 14px 14px 46px;
border-radius:10px;
border:1px solid #cbd5e1;
background:#f9fafb;
font-size:16px;
outline:none;
}

.input-group input:focus{
border-color:#2563eb;
background:white;
}

/* BUTTON */
.btn-submit{
width:100%;
padding:14px;
border:none;
border-radius:10px;
background:#2563eb;
color:white;
font-size:18px;
font-weight:bold;
cursor:pointer;
}

.btn-submit:hover{
background:#1e40af;
}

.change-btn{
display:block;
margin-top:12px;
text-align:center;
padding:12px;
border-radius:10px;
background:#1f2933;
color:white;
text-decoration:none;
font-weight:bold;
}

.change-btn:hover{
background:#374151;
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
.form-box{width:95%;}
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

<div class="form-box">

<h2>Admin Edit Form</h2>

<form method="POST" action="Admin_Edit.php">

<div class="input-group">
<i class="fa fa-id-badge"></i>
<input type="text" name="admin_id" value="<?php echo $admin_id; ?>" readonly>
</div>

<div class="input-group">
<i class="fa fa-user-shield"></i>
<input type="text" name="admin_name" value="<?php echo $admin_name; ?>" required>
</div>

<div class="input-group">
<i class="fa fa-envelope"></i>
<input type="email" name="email" value="<?php echo $email; ?>" required>
</div>

<div class="input-group">
<i class="fa fa-phone"></i>
<input type="text" name="mobile" value="<?php echo $mobile; ?>" required>
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>">

<button type="submit" class="btn-submit">Update Admin</button>

<a href="Admin_Change_Password.php?id=<?php echo $id; ?>" class="change-btn">
Change Password
</a>

</form>

</div>

</div>

</body>
</html>
