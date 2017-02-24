<?php include "config.php"; ?>
<?php
$name=$_POST['foname'];
$size=$_POST['fsize'];
$price=$_POST['price'];
$quantity=$_POST['quant'];
$fname=$_FILES['f1']['name'];
$ftype=$_FILES['f1']['type'];
$fsize=$_FILES['f1']['size'];
$fpath="Admin/files/".rand(0000,9999)."_".microtime(TRUE)."_".$fname;


	$sql1="INSERT INTO `food` (`foname`,`fosize`,`price`,`quantity`,`fname`,`ftype`,`fsize`,`fpath`) VALUES('$name','$size','$price','$quantity','$fname','$ftype','$fsize','$fpath')";
	
	$res=mysql_query($sql1) or die(mysql_error());
	?>