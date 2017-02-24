<?php

if(isset($_POST['ins']))
{
	$aname=$_POST['aname'];
	$apwd=$_POST['password'];
	$r=mysql_query("SELECT * FROM adminlogin WHERE aname='$aname' AND apwd='$apwd'") or die(mysql_error());
	if(mysql_num_rows($r)>0)
	{
		$rr=mysql_fetch_array($r);
		$_SESSION['admin']=$rr;
		
		
		
		header('location:index_2.php?msg=Loged In successfully');
		
	}
	else
	{
		header('location:index.php?err=Invalid email or password');
		
	}
}
?>