<?php include("admin_config.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>
<?php
$fid=$_GET['id'];
$src="SELECT * FROM `food` WHERE `foodid`=$fid";
$rs=mysql_query($src);
$row=mysql_fetch_array($rs);
?>
<h1>Update Record</h1>
<form name="frm" action="admin_update_code.php" method="post">
<table cellpadding="10" style="margin:50px auto;">
<tr>
	<td>Pizza Name</td>
    <td><input type="text" name="foname" required value="<?php echo $row['foname'] ?>"></td>
</tr>
<tr>
    	<td>Pizza Size</td>
        <td>
        	<select name="fsize">
            	<option selected>-Select-</option>
            	<option value="Large">Large</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
            </select>
        </td>
</tr>
<tr>
	<td>Price</td>
    <td><input type="text" name="price" required value="<?php echo $row['price']?>"></td>
</tr>
<tr>
	<td>Quantity</td>
    <td><input type="text" name="quant" required value="<?php echo $row['quantity']?>"></td>
    </tr>

<tr>
	<td>&nbsp;</td>
    <td><input type="hidden" name="id" value="<?php echo $row['foodid'] ?>"><input type="submit" name="ins" value="Save Changes"></td>
</tr>
</table>
</form>
</body>
</html>