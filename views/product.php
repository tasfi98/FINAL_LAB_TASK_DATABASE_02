<?php 
	require_once('header.php');
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
			<td><?=$data['profit']?></td>
			<td>
				<a href="edit-product.php?id=1"> EDIT </a> |
				<a href="delete-product.php?id=1"> DELETE</a>
			</td>
		</tr>

	<?php } ?>
	</table>
</body>
</html>