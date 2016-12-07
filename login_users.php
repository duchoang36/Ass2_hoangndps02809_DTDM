<?php

     include 'config.inc.php';
	 
	 // Check whether username or password is set from android	
     if(isset($_POST['tendn']) && isset($_POST['matkhau']))
     {
		  // Innitialize Variable
		  $result='';
	   	  $tendn = $_POST['tendn'];
          $matkhau = md5($_POST['matkhau']);
		  
		  // Query database for row exist or not
          $sql = 'SELECT * FROM khachhang WHERE  tendn = :tendn AND matkhau = :matkhau and trangthaikh = 1';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':tendn', $tendn, PDO::PARAM_STR);
          $stmt->bindParam(':matkhau', $matkhau, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount())
          {
			 $result="true";	
          }  
          elseif(!$stmt->rowCount())
          {
			  	$result="false";
          }
		  
		  // send result back to android
   		  echo $result;
  	}
	
?>
