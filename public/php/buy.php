<?php include('config.php') ?>
<?php
$fid=$_GET['id'];
$buy="SELECT FROM `food` WHERE `foodid`=$fid";
$rs=mysql_query($buy);
if($rs==1)
{
	header('location:buy_code.php?err=Please Pay The Money To The Delivery Boy');

	exit;
}
else
{
	header('location:buy_code.php?err=Unsucessful');
	exit;
}
?>