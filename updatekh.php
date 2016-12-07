<?php include  'database.php'; ?>
<?php
if(isset($_POST['okKH'])){ // Người dùng đã ấn submit
			$tenkh = $_POST['tenkh'];
			$tendn = $_POST['tendn'];
			$diachi = $_POST['diachi'];
			$gioitinh = $_POST['gioitinh'];
			$sdt = $_POST['sdt'];
			$email = $_POST['email'];
			$trangthaikh = $_POST['trangthaikh']!=''?0:1;
			$trangthaionline = $_POST['trangthaionline'];
      //uploadfile
                    mysqli_query($connect,"UPDATE khachhang  SET tenkh = '$tenkh', tendn = '$tendn',
											diachi ='$diachi',gioitinh = '$gioitinh',
											sdt='$sdt',email = '$email',trangthaikh = '$trangthaikh',
										trangthaionline='' WHERE makh = '$makh'");
					 echo '<script type="text/javascript">alert("UPDATE success");</script>';
           }
?>
