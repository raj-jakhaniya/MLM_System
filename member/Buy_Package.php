<?php
require("Member_Session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buy Package</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>

/* ================= RESET ================= */

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

/* ================= THEME (MEMBER HOME) ================= */

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

/* ================= SIDEBAR ================= */

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

/* ================= TOPBAR ================= */

.topbar{
margin-left:240px;
background:var(--topbar);
color:white;
padding:18px 25px;
font-size:22px;
}

/* ================= CONTENT ================= */

.content{
margin-left:240px;
padding:40px;
}

/* ================= MAIN CARD ================= */

.main-box{
background:var(--card);
padding:30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* ================= TITLE ================= */

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

/* ================= PACKAGE GRID ================= */

.package-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:25px;
}

/* ================= PACKAGE CARD ================= */

.package-card{
background:#f9fafb;
padding:25px;
border-radius:14px;
box-shadow:0 6px 18px rgba(0,0,0,0.15);
cursor:pointer;
border:2px solid transparent;
transition:0.3s;
}

.package-card:hover{
transform:translateY(-5px);
}

.package-card.selected{
border-color:var(--hover);
background:#eff6ff;
}

/* HEADER ICON */

.pkg-header{
text-align:center;
margin-bottom:15px;
}

.pkg-header i{
font-size:40px;
color:var(--hover);
}

/* ROW */

.pkg-row{
display:flex;
align-items:center;
gap:10px;
font-size:16px;
margin-bottom:8px;
}

.pkg-row i{
color:var(--hover);
width:22px;
}

/* PRICE */

.price{
text-align:center;
font-size:22px;
font-weight:bold;
color:var(--hover);
margin-top:10px;
}

/* HIDE RADIO */

.package-card input{
display:none;
}

/* ================= QR BOX ================= */

#qr-box{
display:none;
margin:40px auto;
background:#f9fafb;
padding:30px;
border-radius:14px;
box-shadow:0 6px 18px rgba(0,0,0,0.15);
max-width:420px;
text-align:center;
}

/* UPI TITLE */

.upi-title{
font-size:20px;
font-weight:600;
color:var(--hover);
margin-bottom:15px;
}

.input-box{
position:relative;
}

.input-box i{
position:absolute;
top:50%;
left:12px;
transform:translateY(-50%);
color:var(--hover);
}

.input-box input{
width:100%;
padding:12px 12px 12px 40px;
border-radius:8px;
border:1px solid #ccc;
font-size:16px;
}

.input-box input:focus{
outline:none;
border-color:var(--hover);
}

/* ================= BUY BUTTON ================= */

.buy-btn{
width:100%;
margin-top:25px;
padding:14px;
border:none;
border-radius:10px;
background:var(--hover);
color:white;
font-size:18px;
cursor:pointer;
}

.buy-btn:hover{
background:#1e40af;
}

.buy-btn:disabled{
background:#9ca3af;
cursor:not-allowed;
}

/* ================= RESPONSIVE ================= */

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
<a href="Buy_Package.php" class="active"><i class="fa fa-box"></i>Buy Package</a>
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

<form action="Buy_Package_Insert.php" method="POST">

<div class="content">

<div class="main-box">

<h2 class="page-title">Package</h2>

<div class="package-grid">

<?php
require("connection.php");
$sql="select * from packages";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result)){
?>

<div class="package-card">

<div class="pkg-header">
<i class="fa fa-box-open"></i>
</div>

<div class="pkg-row">
<i class="fa fa-tag"></i> Package Name: <?php echo $row['package_name']; ?>
</div>

<div class="pkg-row">
<i class="fa fa-id-card"></i> Package ID: <?php echo $row['package_id']; ?>
</div>

<div class="pkg-row">
<i class="fa fa-gift"></i> Rewards: <?php echo $row['reward_points']; ?> Points
</div>

<div class="price">₹ <?php echo $row['price']; ?></div>

<input type="radio"
name="package"
value="<?php echo $row['package_id']; ?>"
class="package-radio">

</div>

<?php } ?>

</div>

<!-- QR BOX -->

<div id="qr-box">

<div class="upi-title">
<i class="fa fa-qrcode"></i> Pay via UPI ID
</div>

<div class="input-box">
<i class="fa fa-at"></i>
<input type="text" name="upi_id" placeholder="Enter your UPI ID" required>
</div>

</div>

<button type="submit" id="buyBtn" class="buy-btn" disabled>
Buy Package
</button>

</div>
</div>

</form>

<script>

const radios=document.querySelectorAll(".package-radio");
const cards=document.querySelectorAll(".package-card");
const qrBox=document.getElementById("qr-box");
const buyBtn=document.getElementById("buyBtn");

cards.forEach((card,index)=>{
card.addEventListener("click",()=>{

radios[index].checked=true;

cards.forEach(c=>c.classList.remove("selected"));
card.classList.add("selected");

qrBox.style.display="block";
buyBtn.disabled=false;

qrBox.scrollIntoView({behavior:"smooth",block:"center"});
});
});

</script>

</body>
</html>
