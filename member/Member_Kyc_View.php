<?php
require("Member_Session.php");
require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KYC Data</title>

<!-- Font Awesome -->
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
width:450px;
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

/* INPUT GROUP */
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
.btn{
display:block;
width:100%;
padding:14px;
border:none;
border-radius:10px;
background:#2563eb;
color:white;
font-size:18px;
font-weight:bold;
cursor:pointer;
text-align:center;
text-decoration:none;
}

.btn:hover{
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
.form-box{width:95%;}
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

<?php
$mid = $_SESSION['user_id'];
$sql="SELECT * FROM kyc WHERE member_id='$mid'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
extract($row);
?>

<div class="form-box">

<h2>KYC Data</h2>

<div class="input-group">
<i class="fa fa-id-badge"></i>
<input type="text" value="<?php echo $mid; ?>" readonly>
</div>

<div class="input-group">
<i class="fa fa-circle-info"></i>
<input type="text" value="<?php echo $status; ?>" readonly>
</div>

<?php
if(($status=='pending' && $document=='NULL') || $status=='rejected'){
?>
<a href="Member_Kyc.php" class="btn">
<i class="fa fa-upload"></i> Upload KYC
</a>
<?php } else { ?>
<a href="../admin/Member_Kyc_Document/<?php echo $mid; ?>_Document" class="btn">
<i class="fa fa-eye"></i> View Document
</a>
<?php } ?>

</div>

</div>

</body>
</html>
