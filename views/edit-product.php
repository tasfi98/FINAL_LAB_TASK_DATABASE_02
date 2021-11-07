<?php 
	include('header.php');
	require_once('../model/productsModel.php');
	$result = getProductById($_GET['id']);
?>

<html>
<head>
	<title>Create New User Page</title>
</head>
<body>
	<center>
		<a href="home.php">Back </a> |
		<a href="../controller/logout.php">logout </a>
	</center>

	<form method="post" action="../controller/editProduct.php">
		<fieldset>
			<legend>Create New</legend>
			<table>
				
				<tr>
					<input type="hidden" name="pid" value="<?=$result['pid']?>">
					<td>Product Name:</td>
					<td><input type="text" name="pname" value="<?=$result['pname']?>"></td>
				</tr>
				<tr>
					<td>Buying Price:</td>
					<td><input type="text" name="buying_price" value="<?=$result['buying_price']?>"></td>
				</tr>
				<tr>
					<td>Selling Price:</td>
					<td><input type="text" name="selling_price" value="<?=$result['selling_price']?>"></td>
				</tr>
				<tr>
					<td></td>
				
					<td><input type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html> 