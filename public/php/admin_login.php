<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php include "admin_config.php"; include "admin_login_code.php";  ?>
<body>
<h1>Log In</h1>
            <form name="session" method="post" ac>
            <table cellpadding="6" cellspacing="10">
            <tr align="center">
<td align="center">Username</td>
<td align="center"><input type="text" name="unm"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pwd"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="ins" value="Sign in"><br></td>
</tr>
</table>
</form>
<?php if(isset($_GET['err']))
{
	echo $_GET['err']; 
}
?>
</body>
</html>