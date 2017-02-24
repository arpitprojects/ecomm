<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="css/reset.css" type="text/css"   charset="utf-8" />
		<link rel="stylesheet" href="css/style1.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="css/fractionslider.css">
		
		<script src="js/jquery-1.9.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
		
		<script src="js/main.js" type="text/javascript" charset="utf-8"></script>

</head>
<?php include "config.php";  ?>
<body>
<div id="page">
	<header>
    	<div id="title">
        	<h1 align="left" ><img src="images/logo_1718576_web (1).jpg"></h1>
        </div>
        <nav>
        	<ul>
            	<li><a href="profile.php" class="active">Home</a></li>
                <li><a href="about1.php">About</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="changepwd.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="banner">
    <div class="slider-wrapper" style="margin:0 auto; width:99.7%;">
			<div class="responisve-container">
				<div class="slider">
					<div class="fs_loader"></div>
					<div class="slide">
					<img src="img1/1.jpg" 
								width="1040" height="400" 		
								data-position="0,0" data-in="bottomRight" data-delay="200">
								
												
						<p 		class="claim turky"			
								data-position="30,30" data-in="top" data-step="1" data-out="top" data-ease-in="easeOutBounce">RASAANI PIZZA</p>
														
						<p 		class="teaser orange" 	
								data-position="90,30" data-in="left" data-step="2" data-delay="500">TASTE OF RUSSIA IN INDIA</p>		
					
					</div>
					<div class="slide">
						
						<img    src="img1/pizza-photography-hd-wallpaper-1920x1200-34562.jpg"
                                width="1040" height="400"
								data-position="1,2" data-in="bottomRight" data-delay="200" data-out="bottomRight">
						
						<p 		class="claim light-green" 			
								data-position="30,30" data-in="top" data-step="1" data-out="top">We Serve u with the WORLD BEST INGRIDIENTS</p>
										
											</div>
                    <div class="slide">
                    			<img src="img1/pizza-11660.jpg" 
                    			width="1040" height="400"	
								data-position="1,2" data-in="fade" data-delay="500" data-out="bottomRight">
                                <p 		class="teaser turky" 	
								data-position="30,30" data-in="bottom" data-step="1" data-delay="500">Order Now To Taste It</p>
                    </div>
				</div>
			</div>
		</div>
    </div>
    <section style="height:185px;">
    	
<font color="#FFFFFF" size="6"><p2 class="claim turky" 	
								data-position="30,30" data-in="bottom" data-step="1" data-delay="500">
<?php 
echo "Welcome ".$_SESSION['samrat']['fname'];
?>
</p2>
</font>
        
    </section>
    <footer>
    	<p1>All rights &amp; reserved to Rasaani Pizza<sup>&reg;</sup>2015&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;Design by Samrat Saha</p1>
    </footer>
</div>
</body>
</html>