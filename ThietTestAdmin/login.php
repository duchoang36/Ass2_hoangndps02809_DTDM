<?php
	require_once 'include/DB_Function.php';
	
	$db = new DB_Function();
	$response = array("error"=> false);
		
		$email  = $_POST['email'];
		$password =$_POST['password'];
		
		$user = $db->getUserByEmailAndPassword($email,$password);
		
		if ($user != false ){
			$response ["error"] =false; 
			$response["uid"]=$user["unique_id"];
			$response["user"]["name"] = $user["hoten"];
			$response["user"]["email"] = $user["email"];
			$response["user"]["ngaytao"]= $user["ngaytao"];
			echo json_encode($response);
		}else{
			$response["error"]=true;
			$response["error_msg"]= "Tài khoản hoặc mật khẩu không đúng";
			echo json_encode($response);
		}
		
 ?>
