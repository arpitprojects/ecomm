<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php include "config.php";?>
<body>
<div id="page">
	<header>
    	<div id="title">
        	<h1 align="left" ><img src="images/logo_1718576_web (1).jpg"></h1>
        </div>
        <nav>
        	<ul>
            	<li><a href="profile1.php" class="active">Home</a></li>
                <li><a href="about1.php">About</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="changepwd.php">Change Password</a></li>
            </ul>
        </nav>
    </header>
    <div id="banner">
    </div>
    <section>
    	
<font color="#FFFFFF">
<?php 
echo "Your Order Has Been Placed <br>PLEASE Pay the Cash To The Delivery Boy ".$_SESSION['samrat']['foname'];
?>
</font>
        
    </section>
    <footer>
    	<p>All rights &amp; reserved to Rasaani Pizza<sup>&reg;</sup>2015&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;Design by Samrat Saha</p>
    </footer>
</div>
</body>
</html>