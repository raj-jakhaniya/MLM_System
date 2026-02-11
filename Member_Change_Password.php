<?php
require("Member_Session.php");
?>

<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $member_id = mysqli_real_escape_string($link, $_POST['member_id']);
    $password  = $_POST['password'];

    $sql = "select password from member where member_id='$member_id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        header("Location:Member_New_Password.php");
    } else {
        echo "<script>
        alert('Wrong Password!');
        window.location.href='Member_Change_Password.php';
        </script>";
    }
    exit();
}
?>

<?php
$sql="select * from member where member_id='{$_SESSION['user_id']}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
extract($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Change Password</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

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
width:430px;
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

<div class="form-box">

<h2>Change Password</h2>

<form method="POST">

<div class="input-group">
<i class="fa fa-id-badge"></i>
<input type="text" name="member_id"
value="<?php echo $member_id; ?>" readonly>
</div>

<div class="input-group">
<i class="fa fa-lock"></i>
<input type="password" name="password"
placeholder="Enter Old Password" required>
</div>

<button type="submit" class="btn-submit">
<i class="fa fa-paper-plane"></i> Verify Password
</button>

</form>

</div>

</div>

</body>
</html>
