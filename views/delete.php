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

	<form method="post" action="../controller/deleteProduct.php">
		<fieldset>
			<legend>Create New</legend>
			<label>Product Name: <?=$result['pname']?></label><br>
			<label>Buying Price: <?=$result['buying_price']?></label><br>
			<label>Selling Price: <?=$result['selling_price']?></label><br>
			<input type="hidden" name="pid" value="<?=$result['pid']?>">
			<br>
			<h4> Are you sure you want to delete?</h4>
			<input type="submit" name="submit" value="Delete"></td>
				
		</fieldset>
	</form>
</body>
</html> 