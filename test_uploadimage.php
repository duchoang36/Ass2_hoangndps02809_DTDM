<?php
	header('Content-type:bitmap;charset = utf-8');
	if(isset($_POST["encoded_string"])){
			$encoded_string = $_POST["encoded_string"];
			$image_name = $_POST["image_name"];
			$id = $_POST["id"];
			$decoded_string = base64_decode($encoded_string);
			
			$path = 'imageuploaded/'.$image_name;
			$file = fopen($path,'wb');
			$pathdata = 'http://25corner.com/imageuploaded/'.$image_name;
			$is_written = fwrite($file,$decoded_string);
			fclose($file);
			if($is_written>0){
				// include db connect class
				require_once('test_db_connect.php');
				// connecting to db
				$db = new DB_CONNECT();
			$qr = "
					INSERT INTO photos(name,path) VALUES(
						'$image_name',
						'$path'
					)
				";
				$result = mysql_query($qr);
				//mysql_query($qr);
				//$id = mysql_insert_id();
				//echo "INSERT success $id";
				if($result){
					echo "success";
				}else{
					echo "fail";
				}
			}
	}
?>