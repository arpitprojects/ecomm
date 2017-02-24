<?php  include "config.php"; ?><?php date_default_timezone_set("Asia/Kolkata"); 
    ?>
<?php 
if(isset($_POST['ins']))
{
	
	$foodid=$_POST['food_id'];
	$quan=$_POST['quantity'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	
	
	
	
$in=mysql_query("INSERT INTO `order`(`foodid`,`quan`,`orderdate`,`ordertime`,`userid`) VALUES('$foodid','$quan','$date','$time','".$_SESSION['samrat']['userid']."')"); if($in==0) { echo mysql_error(); } else {  $x=mysql_query("SELECT * FROM food WHERE `foodid`='$foodid'"); $rowc=mysql_fetch_array($x);
$actual_quan=$rowc['quantity'];
$new_quan=$actual_quan-$quan;
$upd=mysql_query("UPDATE food SET `quantity`='$new_quan' WHERE `foodid`='$foodid'");   } }?>
<?php 
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByFoodId=mysql_query("SELECT * FROM `food` WHERE `foodid`='".$_GET["foodid"]."'");
			
			while($productByFoodIdd=mysql_fetch_array($productByFoodId)) {
		$itemArray = array($productByFoodIdd["foodid"]=>array('foname'=>$productByFoodIdd["foname"], 'foodid'=>$productByFoodIdd["foodid"], 'quantity'=>$_POST["quantity"], 'price'=>$productByFoodIdd["price"]));
			}
			
			
			
			if(!empty($_SESSION["cart_item"])) {
				
				
				if(in_array($productByFoodId[0]["foodid"],$_SESSION["cart_item"])) {
					
					foreach($_SESSION["cart_item"] as $k => $v) {
						
							if($productByFoodId[0]["foodid"] == $k)
							
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
								
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			
			foreach($_SESSION["cart_item"] as $k => $v) {
				
					if($_GET["foodid"] == $k)
					
						unset($_SESSION["cart_item"][$k]);
										
					if(empty($_SESSION["cart_item"]))
					
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
	
	
		
}
}
?>

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
                <li><a href="about1.php">About</a></li>          
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


<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<div id="shopping-cart">
<div class="txt-heading">Cart <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a></div>
<table cellpadding="10" cellspacing="1" border="1" style="border-color:#FFF; color:#FF6; font-weight:900; background:#666;">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Food ID</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	<form method="post" action="po.php">
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["foname"]; ?></strong></td>
				<td><input type="hidden" value="<?php echo $item["foodid"]; ?>" name="foodid" readonly></td>
				<td><input type="number" value="<?php echo $item["quantity"]; ?>" name="quantity" readonly></td>
				<td align=right><?php echo "Rs ".$item["price"]; ?></td>
				<td><a href="cart.php?action=remove&foodid=<?php echo $item["foodid"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>
       

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "Rs ".$item_total; ?></td>
</tr>
<tr>
<td><input type="submit" name="ok" value="Place Order"></form></td>
</tr>

</tbody>
</table>		
  <?php
}
else
{
	echo "Your Cart is empty";
}?>

</div>
   
 </section>
     <footer>
	  <p1>All rights &amp; reserved to Rasaani <sup>&reg;</sup>2015&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;Design by Samrat Saha</p1>
    </footer>
	
  </div>
  
 </body>
</html>
