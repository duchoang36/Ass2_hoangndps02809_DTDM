<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbConnect.php');
		$hinhanh = $_POST['hinhanh'];
		$tendn = $_POST['tendn'];
		
		
		$sql ="SELECT makh FROM khachhang where tendn = '$tendn'";
		
		$res = mysqli_query($con,$sql);
	
		
		while($row = mysqli_fetch_array($res)){
				$makh = $row['makh'];
		}
		
		$path = "imageuploaded/$makh.png";
		
		$actualpath = "http://25corner.com/$path";
		
		$sql = "Update khachhang set hinhanh = '$actualpath' where  tendn = '$tendn' ";
		
		if(mysqli_query($con,$sql)){
			file_put_contents($path,base64_decode($hinhanh));
			echo "Successfully Uploaded";
		}
		
		mysqli_close($con);
	}else{
		echo "Error";
	}
