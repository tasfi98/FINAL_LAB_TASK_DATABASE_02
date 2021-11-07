<?php 

	require_once('db.php');


	function addProduct($Product){
		$con = getConnection();
		$sql = "insert into products values('', '{$Product['pname']}', '{$Product['buying_price']}', '{$Product['selling_price']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function getAllproducts(){
		$con = getConnection();
		$sql = "select * from products";
		$result = mysqli_query($con, $sql);
		return $result;
	}	

	function getProductById($id){
		$con = getConnection();
		$sql = "select * from products where pid={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result); 
		return $data;
	}

	function editProduct($Product){
		$con = getConnection();
		$sql = "update products set pname='{$Product['pname']}', buying_price='{$Product['buying_price']}', selling_price='{$Product['selling_price']}' where pid='{$Product['pid']}'";
		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteProduct($id){
		$con = getConnection();
		$sql = "delete from products where id={$id}";
		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}
?> 