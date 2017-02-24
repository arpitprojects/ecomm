
<?php
if(empty($_SESSION['samrat1']))
{
	header('location:admin_login.php?err=Please Log in');
	
}
?>