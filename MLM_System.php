<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MLM System</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

:root{
--bg:#f3f4f6;
--card:#ffffff;
--primary:#2563eb;
--dark:#1f2933;
--text:#111827;
--muted:#6b7280;
}

body{
background:var(--bg);
color:var(--text);
}

/* NAVBAR */

.navbar{
display:flex;
justify-content:space-between;
align-items:center;
padding:18px 60px;
background:var(--dark);
position:sticky;
top:0;
z-index:1000;
}

.navbar h2{
color:white;
}

.navbar a{
color: black;
margin-left:25px;
text-decoration:none;
font-size:16px;
padding: 10px;
background: #fff;
border-radius: 5px;
font-weight: bold;
}

.navbar a:hover{
background-color: #cec9c9;
}

/* HERO */

.hero{
display:flex;
justify-content:center;
align-items:center;
min-height:70vh;
text-align:center;
padding:40px 20px;
background:linear-gradient(to right,#2563eb,#1e40af);
color:white;
}

.hero h1{
font-size:46px;
margin-bottom:15px;
}

.hero p{
font-size:18px;
max-width:650px;
margin:auto;
}

.hero button{
margin-top:25px;
padding:14px 40px;
border:none;
border-radius:8px;
background:white;
color:#1e40af;
font-size:18px;
cursor:pointer;
font-weight:bold;
}

.hero button:hover{
background:#e0e7ff;
}

/* SECTION */

.section{
padding:70px 60px;
text-align:center;
}

.section h2{
font-size:34px;
margin-bottom:40px;
color:#1e40af;
}

/* GRID CARDS */

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
}

.card{
background:var(--card);
padding:30px;
border-radius:14px;
box-shadow:0 10px 25px rgba(0,0,0,0.12);
transition:0.3s;
}

.card:hover{
transform:translateY(-8px);
}

.card i{
font-size:40px;
color:var(--primary);
margin-bottom:15px;
}

.card h3{
margin-bottom:10px;
}

/* CONTACT INFO */

.contact-box{
background:#1e40af;
color:white;
padding:25px;
border-radius:12px;
}

.contact-box i{
font-size:26px;
margin-bottom:10px;
}

/* CTA */

.cta{
background:#1e40af;
color:white;
padding:70px 40px;
text-align:center;
}

.cta button{
margin-top:25px;
padding:14px 40px;
border:none;
border-radius:8px;
background:white;
color:#1e40af;
font-size:18px;
font-weight:bold;
cursor:pointer;
}

/* FOOTER */

.footer{
background:var(--dark);
padding:25px;
text-align:center;
color:#cbd5e1;
}

/* MOBILE */

@media(max-width:768px){
.navbar{
flex-direction:column;
gap:10px;
}
.hero h1{
font-size:32px;
}
}

</style>
</head>

<body>

<!-- NAVBAR -->

<div class="navbar">
<h2>MLM SYSTEM</h2>

<div>
<a href="member/Member_Login.php">Member Login</a>
<a href="admin/Admin_Login.php">Admin Login</a>
<a href="member/Member_Registration.php">Register</a>
</div>
</div>

<!-- HERO -->

<section class="hero">
<div>

<h1>Grow Your Income With Our MLM Platform</h1>

<p>
Build your network, earn commissions, and achieve financial freedom using our secure and powerful MLM system.
</p>

<button onclick="location.href='member/Member_Registration.php'">Get Started</button>

</div>
</section>

<!-- HOW SYSTEM WORKS -->

<section class="section">
<h2>How Our MLM System Works</h2>

<div class="grid">

<div class="card">
<i class="fa fa-user-plus"></i>
<h3>Add Member</h3>
<p>Add New Members and Earn More Points.</p>
</div>

<div class="card">
<i class="fa fa-box"></i>
<h3>Buy Package</h3>
<p>Buy Package to get Points Easily.</p>
</div>

<div class="card">
<i class="fa fa-wallet"></i>
<h3>Withdraw Points</h3>
<p>Withdraw Points and Get Money In Wallet.</p>
</div>

<div class="card">
<i class="fa fa-box"></i>
<h3>Buy Product</h3>
<p>Buy Product with Wallet Money.</p>
</div>

</div>
</section>

<!-- CONTACT INFO -->

<section class="section">
<h2>Contact Us</h2>

<div class="grid">

<div class="contact-box">
<i class="fa fa-phone"></i>
<h3>Phone</h3>
<p>+91 81284 85878</p>
</div>

<div class="contact-box">
<i class="fa fa-envelope"></i>
<h3>Email</h3>
<p>rajjakhaniya@gmail.com</p>
</div>

<div class="contact-box">
<i class="fa fa-location-dot"></i>
<h3>Office</h3>
<p>India</p>
</div>

</div>
</section>

<!-- CTA -->

<section class="cta">
<h2>Start Your Journey Today</h2>
<p>Create your free account and begin earning.</p>
<button onclick="location.href='member/Member_Registration.php'">Join Now</button>
</section>

<!-- FOOTER -->

<div class="footer">
© 2026 MLM System | All Rights Reserved
</div>

</body>
</html>
