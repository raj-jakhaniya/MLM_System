<?php
require("Member_Session.php");
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wallet</title>

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

/* SUMMARY CARDS */
.summary-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-bottom:30px;
}

.summary-card{
background:var(--card);
padding:25px;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
text-align:center;
}

.summary-card i{
font-size:35px;
color:var(--hover);
margin-bottom:10px;
}

.summary-card h3{
font-size:20px;
margin-bottom:5px;
}

.summary-card p{
font-size:22px;
font-weight:bold;
}

/* TABLE CARD */
.table-card{
background:var(--card);
padding:30px;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.page-title{
text-align:center;
font-size:26px;
font-weight:600;
margin-bottom:20px;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
}

th{
background:var(--sidebar);
color:white;
padding:12px;
}

td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

tr:hover{
background:#eef2ff;
}

/* ACTION BUTTONS */
.action-row{
margin-top:30px;
display:flex;
justify-content:center;
gap:25px;
flex-wrap:wrap;
}

.action-btn{
padding:15px 35px;
border-radius:8px;
font-size:18px;
font-weight:600;
text-decoration:none;
color:white;
}

.buy{
background:#dc2626;
}

.withdraw{
background:#16a34a;
}

.buy:hover{background:#b91c1c;}
.withdraw:hover{background:#15803d;}

/* RESPONSIVE */
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

<?php
$sql="SELECT SUM(amount) AS total_credits FROM wallet 
      WHERE member_id='{$_SESSION['user_id']}' AND type='credit'";
$r=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($r);
$total_credits=$row['total_credits'] ?? 0;

$sql="SELECT SUM(amount) AS total_debits FROM wallet 
      WHERE member_id='{$_SESSION['user_id']}' AND type='debit'";
$r=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($r);
$total_debits=$row['total_debits'] ?? 0;

$net_balance=$total_credits-$total_debits;
?>

<!-- SUMMARY -->
<div class="summary-grid">

<div class="summary-card">
<i class="fa fa-wallet"></i>
<h3>Net Balance</h3>
<p>₹ <?php echo $net_balance; ?></p>
</div>

<div class="summary-card">
<i class="fa fa-arrow-down"></i>
<h3>Total Credits</h3>
<p>₹ <?php echo $total_credits; ?></p>
</div>

<div class="summary-card">
<i class="fa fa-arrow-up"></i>
<h3>Total Debits</h3>
<p>₹ <?php echo $total_debits; ?></p>
</div>

</div>

<!-- TABLE -->
<div class="table-card">

<div class="page-title">
<i class="fa fa-list"></i> Wallet History
</div>

<table>

<tr>
<th>Member ID</th>
<th>Amount</th>
<th>Type</th>
<th>Description</th>
</tr>

<?php
$sql="SELECT * FROM wallet WHERE member_id='{$_SESSION['user_id']}'";
$result=mysqli_query($link,$sql);

while($row=mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['member_id']; ?></td>
<td>₹ <?php echo $row['amount']; ?></td>
<td><?php echo ucfirst($row['type']); ?></td>
<td><?php echo $row['description']; ?></td>
</tr>

<?php } ?>

</table>

<div class="action-row">

<a href="Buy_Product.php" class="action-btn buy">
<i class="fa fa-box"></i> Buy Product
</a>

<a href="Member_Withdrawals_Form.php" class="action-btn withdraw">
<i class="fa fa-hand-holding-dollar"></i> Withdraw Points
</a>

</div>

</div>

</div>

</body>
</html>
