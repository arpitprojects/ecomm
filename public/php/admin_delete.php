<?php include('admin_config.php') ?>
<?php
$fid=$_GET['id'];
$del="DELETE FROM `food` WHERE `foodid`=$fid";
$rs=mysql_query($del);
if($rs==1)
{
	header('location:admin_login1.php?err=Record delete sucessfully');
	exit;
}
else
{
	header('location:admin_login1.php?err=Record not delete');
	exit;
}
?>