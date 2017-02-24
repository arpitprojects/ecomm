<?php

if(isset($_POST['ins']))
{
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$r=mysql_query("SELECT * FROM userprofile WHERE email='$email' AND pwd='$pwd'") or die(mysql_error());
	
	if(mysql_num_rows($r)>0)
	{
		$rr=mysql_fetch_array($r);
		$_SESSION['samrat']=$rr;
		
		
		
		header('location:profile.php?msg=Loged In successfully');
		
	}
	else
	{
		header('location:login.php?err=Invalid email or password');
		
	}
}
?>