<?php include"config.php"; include "session_empty.php";?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>About</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="css/reset.css" type="text/css"   charset="utf-8" />
		<link rel="stylesheet" href="css/style1.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="css/fractionslider.css">
        <link href="style.css" type="text/css" rel="stylesheet" />
		
		<script src="js/jquery-1.9.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
		
		<script src="js/main.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<style type="text/css">
.btnAdd {
	width:90px;
	height:40px;
	padding:10px;
	color:#FFF;
	background:#333;
	border:1px #999999;
	
}
.btnAdd:hover {
	width:90px;
	height:40px;
	padding:10px;
	color:#FFF;
	background:#666;
	border:1px #999999;
	cursor:pointer;
	
}
</style>
<div id="page">
	<header>
    	<div id="title">
        	<h1 align="left" ><img src="images/logo_1718576_web (1).jpg"></h1>
        </div>
        <nav>
        	<ul>
            	<li><a href="profile.php">Home</a></li>
                <li><a href="about1.php">About</a></li>
                <li><a href="order.php" class="active">Order</a></li>
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
    <section>


<div id="reg1" style="padding:2%;">
<div id="product-grid">
	<div class="txt-heading">Products</div>
    <table cellpadding="2" cellspacing="5" style="width:99.6%; text-align:center;">
    
	<?php
	
	
	$product_arrayy=mysql_query("SELECT * FROM food ORDER BY foodid ASC");
	$cols=1; ?> <tr style="margin-bottom:10px;"> <?php
	while($product_array=mysql_fetch_array($product_arrayy))
	{?>
    <?php if($cols>2) { ?> </tr><tr> <?php $cols=1; } ?> 
		
			<td><form method="post" action="cart.php?action=add&foodid=<?php echo $product_array["foodid"]; ?>">
		<div class="product-image"><img src="<?php echo "Admin/".$product_array["fpath"]; ?>" width="160" height="160" style="border:solid 1px #FFFFFF; border-radius:4px; "></div>
            <div><strong><?php echo $product_array["foname"]; ?></strong></div>
			<div class="product-price"><?php echo "Rs ".$product_array["price"]; ?></div>
            <input type="hidden" name="food_id" value="<?php echo $product_array['foodid'] ?>">
			<div><input type="text" name="quantity" value="1" size="2" />
            <input type="submit" value="Add to cart" name="ins" class="btnAdd" /></div>
			</form></td>
            <?php  $cols++; ?>
            
		
	<?php
	}
	?>
   

    </tr>
    </table>
</div>












</div>
    </section>
    <footer>
    	<p1>All rights &amp; reserved to Rasaani <sup>&reg;</sup>2015&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;Design by Samrat Saha</p1>
    </footer>
</div>
    </body>
    </html>