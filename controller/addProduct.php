<?php 
	//session_start();
	require_once('../model/productsModel.php');

	if(isset($_POST['submit'])){

		$pname 	= $_POST['pname'];
		$buying_price 		= $_POST['buying_price'];
		$selling_price 	= $_POST['selling_price'];

		if($pname != ""){
			if($selling_price != ""){
				if($buying_price !=""){

					$product = ['pname'=> $pname, 'buying_price'=>$buying_price, 'selling_price'=>$selling_price];
					$status = addProduct($product);

					if($status){
						header('location: ../views/product.php');
					}else{
						echo "try again...";
					}

				}else{
					echo "invalid buying_price....";
				}
			}else{
				echo "invalid selling_price....";
			}
		}else{
			echo "invalid pname....";
		}
	}
?> 