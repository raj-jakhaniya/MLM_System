<?php
session_start();
require("connection.php");

/* CHECK LOGIN */
if(!isset($_SESSION['user_id'])){
    header("Location: Member_Login.php");
    exit();
}

$member_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'] ?? 0;

if($product_id==0){
    echo "<script>
    alert('Invalid Product');
    window.location.href='Buy_Product.php';
    </script>";
    exit();
}

/* FETCH PRODUCT PRICE */
$q="SELECT price FROM products WHERE product_id='$product_id'";
$r=mysqli_query($link,$q);
$row=mysqli_fetch_assoc($r);
$product_price = $row['price'];

/* WALLET BALANCE */
$q="SELECT SUM(amount) AS c FROM wallet 
    WHERE member_id='$member_id' AND type='credit'";
$r=mysqli_query($link,$q);
$c=mysqli_fetch_assoc($r)['c'] ?? 0;

$q="SELECT SUM(amount) AS d FROM wallet 
    WHERE member_id='$member_id' AND type='debit'";
$r=mysqli_query($link,$q);
$d=mysqli_fetch_assoc($r)['d'] ?? 0;

$balance = $c - $d;

/* CHECK BALANCE */
if($balance < $product_price){
    echo "<script>
    alert('Insufficient Balance!');
    window.location.href='Buy_Product.php';
    </script>";
    exit();
}

/* INSERT PURCHASE */
mysqli_query($link,
"INSERT INTO products_purchases(member_id,product_id,price)
VALUES('$member_id','$product_id','$product_price')");

/* WALLET DEBIT */
mysqli_query($link,
"INSERT INTO wallet(member_id,amount,type,description)
VALUES('$member_id','$product_price','debit','Product Purchase')");

echo "<script>
alert('Product Purchased Successfully!');
window.location.href='Buy_Product.php';
</script>";
exit();
?>
