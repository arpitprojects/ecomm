<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Profile</title>
</head>
<?php include "admin_config.php"; include "admin_session_empty.php";?>
<body>
<?php 
echo "Welcome ".$_SESSION['samrat1']['aname'];
?>
<br><a href="admin_logout.php">Logout</a></br>

<body>
<h1> Uploading</h1>
<form name="frm" method="post" action="food_upload_code.php" enctype="multipart/form-data">
<table cellpadding="7">
<tr>
	<td>Pizza name</td>
    <td><input type="text" name="foname" required></td>
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
    <td><input type="text" name="price" required></td>
</tr>
<tr>
	<td>Quantity</td>
    <td><input type="text" name="quant" required></td>
    </tr>
<tr>
	<td>Select File</td>
    <td><input type="file" name="f1" required></td>
</tr>
<tr>
	<td><input type="submit" name="up" value="Upload"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
{
	echo $_GET['msg'];	
}
else
{
	if(isset($_GET['err']))
	{
		echo $_GET['err'];
	}
}
?>
<hr>
<h1>Food List</h1>
<?php
$src="SELECT * FROM `food`";
$rs=mysql_query($src)or die(mysql_error());
/*if(mysql_num_rows($rs)>0)
{

	//$tot_rec=mysql_num_rows($rs);
	//echo "Total no of records ".$tot_rec."<br>";*/
	?>
    <table border="1" cellpadding="5">
    <thead>
    	<tr>
        	<th>Sl_no</th>
            <th>Name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
	<?php
	$sl=1;
	while($row=mysql_fetch_array($rs))
	{
		
			?>
        	<td><?php echo $sl ?></td>
            <td><?php echo $row['foname'] ?></td>
            <td><?php echo $row['fosize'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['fname'] ?></td>
            <td align="center"><a href="admin_update.php?id=<?php echo $row['foodid']; ?>"><img src="img/edit.png"></a></td>
            <td align="center"><a href="admin_delete.php?id=<?php echo $row['foodid'] ?>" onClick="return confirm('do you want to delete <?php echo $row['foname'] ?> ?')"><img src="img/delete.png"></a></td>

        </tr>
		<?php
		$sl++;
	}
	?>
    </tbody>
    </table>
    <?php
/*}
//else
//{
	//echo "No record found";
//}*/

?>

	</body>
</html>