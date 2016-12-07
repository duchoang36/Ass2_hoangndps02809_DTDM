<?php include  'database.php'; ?>
<?php 
  $query = "Select * from quantri";
  $result = mysqli_query($connect,$query);
  while($row = mysqli_fetch_array($result)){
    $emailqt = $row['email'];
    $tendnqt = $row['tendn'];
    //echo $tendnqt;
  }
?>
<?php
if(isset($_POST['ok'])){ // Người dùng đã ấn submit
			$tenqt = $_POST['tenqt'];
			$tendn = $_POST['tendn'];
			$diachi = $_POST['diachi'];
			$gioitinh = $_POST['gioitinh'];
			$sdt = $_POST['sdt'];
			$email = $_POST['email'];
			$matkhau = md5($_POST['matkhau']);
      if($email == $emailqt){
          echo '<script type="text/javascript">alert("Email đã tồn tại");</script>';
      }else if($tendn == $tendnqt){
          echo '<script type="text/javascript">alert("Tên đăng nhập đã tồn tại");</script>';
      }else
      {
              //uploadfile
      mysqli_query($connect,"INSERT INTO quantri (maqt,tenqt,tendn,matkhau,diachi,gioitinh,sdt,email) VALUES (null,'$tenqt','$tendn','$matkhau','$diachi','$gioitinh','$sdt','$email')");
			 echo '<script type="text/javascript">alert("Add success");</script>';
      }
    }
?>
