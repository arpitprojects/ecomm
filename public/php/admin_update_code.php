<?php include('admin_config.php') ?>
<?php
$name=$_POST['foname'];
$size=$_POST['fsize'];
$price=$_POST['price'];
$quantity=$_POST['quant'];
$fid=$_POST['id'];
$upd="UPDATE `food` SET `foname`='$name',`fosize`='$size',`price`='$price',`quantity`='$quantity' WHERE `foodid`=$fid";
$res=mysql_query($upd);
if($res==1)
{
	header('location:index_2.php?msg=Update sucessfully');
	exit;
}
else
{
	header('location:index_2.php?err=Update unsucessfully');
	exit;
}
?>