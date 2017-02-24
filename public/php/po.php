<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
  <title>Pizza Store</title>
  <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="css/reset.css" type="text/css"   charset="utf-8" />
		<link rel="stylesheet" href="css/style1.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="css/fractionslider.css">
		
		<script src="js/jquery-1.9.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
        <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div id="page">
	<header>
    	<div id="title">
        	<h1 align="left" ><img src="images/logo_1718576_web (1).jpg"></h1>
        </div>
        <nav>
        	<ul>
            	<li><a href="profile.php">Home</a></li>          
                <li><a href="order.php" >Order</a></li>
                <li><a href="cart.php" class="active">Cart</a></li>
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


	<?php include "config.php"; ?>
<div id="place-order">
<form name="placeorder" method="post">
<table cellpadding="10" cellspacing="1" border="1" style="border-color:#FFF; color:#FF6; font-weight:900; background:#666;">
<tbody>
<tr>
<td>Name</td>
<td><input type="text" name="name" ></td>
</tr>
<td>Address</td>
<td><textarea name="address" rows="4" cols="12"></textarea></td>
</tr>	
<tr>
<td>Phone No:</td>
<td><input type="text" name="phno"></td>
</tr>
<td><input type="hidden" name="uid" value="<?php echo $_SESSION['samrat']['userid'] ?>"></td>


<tr>
<td><input type="submit" name="plcordr" value="Place Order"></td>
</tr>


</tbody>
</table>		
</form>
<?php if(isset($_POST['plcordr']))
{
	unset($_SESSION['cart_item']);
	$uid=$_POST['uid'];
	$name=$_POST['name'];
	$add=$_POST['address'];
	$phno=$_POST['phno'];
	

 
	$r=mysql_query("INSERT INTO `placeorder` (`name`,`address`,`phno`,`userid`) VALUES ('$name','$add','$phno','$uid')");
	$n=mysql_query("INSERT INTO `notify` (`userid`,`phno`) VALUES ('$uid','$phno')");
	
	if($r==1)
	{
		if($n==1)
		{
		
		
		header('location:final_page.php?msg=Order Placed');
		}
		
	}
	else
	{
		header('location:po.php?err=Something went wrong').mysql_error();
	}





  }
	  ?>

</div>
   
 </section>
     <footer>
	  <p1>All rights &amp; reserved to Rasaani <sup>&reg;</sup>2015&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;Design by Samrat Saha</p1>
    </footer>
	
  </div>
  
 </body>
</html>