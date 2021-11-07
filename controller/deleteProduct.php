<?php 
	//session_start();
	require_once('../model/productsModel.php');

	if(isset($_POST['submit'])){
		$pid = $_POST['pid'];

					$status = deleteProduct($pid);
					if($status){
						header('location: ../views/product.php');
					}else{
						echo "try again...";
					}

	}
?> 