<?php 
	//session_start();
	require_once('../model/productsModel.php');

	if(isset($_POST['submit'])){
		$pid = $_POST['pid'];
		$pname 	= $_POST['pname'];
		$buying_price 		= $_POST['buying_price'];
		$selling_price 	= $_POST['selling_price'];


					$product = ['pid'=>$pid, 'pname'=> $pname, 'buying_price'=>$buying_price, 'selling_price'=>$selling_price];
					$status = editProduct($product);
					if($status){
						header('location: ../views/product.php');
					}else{
						echo "try again...";
					}

	}
?> 