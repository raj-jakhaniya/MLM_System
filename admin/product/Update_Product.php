<?php
 require("../Admin_Session.php");   // COMMENTED
?>
<?php
include("../connection.php");
extract($_GET);
$sql = "select * from products where product_id=$product_id";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);
extract($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>

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
--sidebar:#1f2933;
--topbar:#1f2933;
--bg:#f3f4f6;
--card:#ffffff;
--primary:#2563eb;
--link:#cbd5e1;
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

/* CARD */
.form-box{
background:var(--card);
width:520px;
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
font-size:24px;
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
color:var(--primary);
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
border-color:var(--primary);
background:white;
}

/* BUTTON */
.btn-submit{
width:100%;
padding:14px;
border:none;
border-radius:10px;
background:var(--primary);
color:white;
font-size:18px;
font-weight:bold;
cursor:pointer;
}

.btn-submit:hover{
background:#1e40af;
}

.action-btn{
display:inline-block;
padding:8px 14px;
border-radius:8px;
font-size:14px;
font-weight:600;
text-decoration:none;
color:white;
transition:0.3s;
}

.btn-view{
background:#2563eb;
}

.btn-view:hover{
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
.content{padding:25px;}
.form-box{width:95%;}
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
<h2>Dashboard</h2>

<a href="../Admin_Home.php"><i class="fa fa-house"></i>Home</a>
<a href="../Admin_Member_View.php"><i class="fa fa-users"></i>View Member</a>
<a href="../Admin_View.php"><i class="fa fa-user-shield"></i>View Admin</a>
<a href="../Admin_Registration.php"><i class="fa fa-user-plus"></i>Add Admin</a>
<a href="../package/View_Package.php"><i class="fa fa-box"></i>Manage Package</a>
<a href="../Admin_Member_Purchase.php"><i class="fa fa-cart-shopping"></i>Package Purchase History</a>
<a href="View_Product.php"><i class="fa fa-box"></i>Manage Product</a>
<a href="../Admin_Member_Product_Purchase.php"><i class="fa fa-cart-shopping"></i>Product Purchase History</a>
<a href="../Admin_Member_Withdrawals_View.php"><i class="fa fa-wallet"></i>Point Withdraw History</a>
<a href="../Admin_Member_Wallet.php"><i class="fa fa-coins"></i>Member Wallet</a>
<a href="../Admin_Member_Kyc_View.php"><i class="fa fa-id-card"></i>Member KYC</a>
<a href="../Admin_Logout.php"><i class="fa fa-right-from-bracket"></i>Logout</a>
</div>

<!-- TOPBAR -->
<div class="topbar">
MLM System - Admin Panel
</div>

<!-- CONTENT -->
<div class="content">

<div class="form-box">

<h2>Edit Product</h2>

<form method="POST" action="Edit_Product.php" enctype="multipart/form-data">

<div class="input-group">
<i class="fa fa-hashtag"></i>
<input type="number" name="product_id" value="<?php echo $product_id; ?>" readonly>
</div>

<div class="input-group">
<i class="fa fa-box"></i>
<input type="text" name="product_name" value="<?php echo $product_name; ?>" required>
</div>

<div class="input-group">
<i class="fa fa-indian-rupee-sign"></i>
<input type="number" name="price" value="<?php echo $price; ?>" required>
</div>

<div class="input-group">
<i class="fa fa-coins"></i>
<input type="text" name="description" value="<?php echo $description; ?>" required>
</div>

<div class="input-group">
<i class="fa fa-image"></i>
<input type="file" name="product_new_image" title="Select Product's New Image">
</div>


<a class="action-btn btn-view" 
href="Product_Image/<?php echo $product_image; ?>">
<i class="fa fa-eye"></i> Old Image
</a><br><br>

<button type="submit" class="btn-submit">
<i class="fa fa-save"></i> Update Product
</button>

</form>

</div>

</div>

</body>
</html>
