<?php
require("Member_Session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buy Product</title>

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

/* PACKAGE CARD */
.package-card{
background:#f9fafb;
padding:25px;
padding-bottom:90px;     /* space reserved for button */
border-radius:14px;
box-shadow:0 6px 18px rgba(0,0,0,0.15);
cursor:pointer;
border:2px solid transparent;
transition:0.3s;
position: relative;

display:flex;
flex-direction:column;
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

/* ================= BUY BUTTON ================= */

/* BUY BUTTON */
.buy-btn{
width:90%;
padding:14px;
border:none;
border-radius:10px;
background:var(--hover);
color:white;
font-size:18px;
cursor:pointer;

position:absolute;
bottom:20px;
left:50%;
transform:translateX(-50%);

display:flex;
align-items:center;
justify-content:center;
min-height:45px;
white-space:nowrap;
}


.buy-btn:hover{
background:#1e40af;
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
/* PRODUCT DETAILS CARD LOOK */

.pkg-details{
margin-top:10px;
display:flex;
flex-direction:column;
gap:10px;
}

/* Each row improved */
.pkg-row{
background:#ffffff;
padding:10px 12px;
border-radius:8px;
box-shadow:0 2px 6px rgba(0,0,0,0.08);
font-size:15px;
display:flex;
align-items:flex-start;
gap:10px;
}

/* Icon style */
.pkg-row i{
color:var(--hover);
font-size:18px;
margin-top:2px;
}

/* Labels */
.pkg-row b{
color:#1f2933;
min-width:120px;
}

/* Description text */
.pkg-desc{
color:#374151;
line-height:1.5;
}

/* Price badge */
.pkg-price{
text-align:center;
margin-top:15px;
font-size:22px;
font-weight:bold;
color:white;
background:linear-gradient(135deg,#2563eb,#1e40af);
padding:10px;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
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



<div class="content">

<div class="main-box">

<h2 class="page-title">Product</h2>

<div class="package-grid">

<?php
require("connection.php");
$sql="select * from products";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result)){
?>

<div class="package-card">
<form action="Buy_Product_Insert.php" method="POST">
<div class="pkg-header">
<img src="../admin/product/Product_Image/<?php echo $row['product_image'];?>" width="200px" height="200px">
</div>

<div class="pkg-details">

<div class="pkg-row">
<i class="fa-solid fa-tag"></i>
<b>Product ID</b>
<span><?php echo $row['product_id']; ?></span>
</div>

<div class="pkg-row">
<i class="fa-solid fa-box"></i>
<b>Product Name</b>
<span><?php echo $row['product_name']; ?></span>
</div>

<div class="pkg-row">
<i class="fa-solid fa-file-lines"></i>
<b>Description</b>
<span class="pkg-desc"><?php echo $row['description']; ?></span>
</div>

</div>


<button type="submit" class="buy-btn" name="buy" value="<?php echo $row['product_id']; ?>">
Buy For ₹ <?php echo $row['price']; ?>
</button>
<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
</div>
<?php } ?>

</div>
</div>
</div>

</form>

</body>
</html>
