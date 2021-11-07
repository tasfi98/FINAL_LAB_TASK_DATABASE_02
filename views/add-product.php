<?php 
	include('header.php');
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

	<form method="post" action="../controller/addProduct.php">
		<fieldset>
			<legend>Create New</legend>
			<table>
				<tr>
					<td>Product Name:</td>
					<td><input type="text" name="pname" value=""></td>
				</tr>
				<tr>
					<td>Buying Price:</td>
					<td><input type="text" name="buying_price" value=""></td>
				</tr>
				<tr>
					<td>Selling Price:</td>
					<td><input type="text" name="selling_price" value=""></td>
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