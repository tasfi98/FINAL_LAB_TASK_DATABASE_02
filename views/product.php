<?php 
	require_once('header.php');
	require_once('../model/productsModel.php');
	$result = getAllproducts();
	$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<center>
		<a href="home.php">Back </a> |
		<a href="add-product.php">Add Product </a> |
		<a href="../controller/logout.php">logout </a>
	</center>

	<table border="1" align="center">
		<tr>
			<th>Name</th>
			<th>Profit</th>
			<th>ACTION</th>
		</tr>

	<?php while($data = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?=$data['pname']?></td>
			<td><?=$data['selling_price']-$data['buying_price']?></td>
			<td>
				<a href="edit-product.php?id=<?=$data['pid']?>"> EDIT </a> |
				<a href="delete.php?id=<?=$data['pid']?>"> DELETE</a>
			</td>
		</tr>

	<?php } ?>
	</table>
</body>
</html>