<?php include $Link = 'database.php'; ?>
<?php
if(isset($_POST['ok'])){ // Người dùng đã ấn submit
    if($_FILES['file']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"){
        // Tiến hành code upload
            if($_FILES['file']['size'] > 1048000){
                echo '<script type="text/javascript">alert("kich cỡ hình ảnh không lớn hơn 1mb");</script>';
            }else{
              $Aserver = "imageuploaded/";
              $path = "imageuploaded/"; // file sẽ lưu vào thư mục data
              $tmp_name = $_FILES['file']['tmp_name'];
              $name = $_FILES['file']['name'];
                // file hợp lệ, tiến hành upload
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $thongtinsp = $_POST['thongtinsp'];
                $hinhanh = $_POST['hinhanh'];
                //$soluong = $_POST['soluong'];
                $matheloai = $_POST['matheloai'];
                $maqt = $_POST['maqt'];
                $type = $_FILES['file']['type'];
                $size = $_FILES['file']['size'];
                //Upload file
                //if (file_exists($Aserver.$name)) {
				//	echo '<script type="text/javascript">alert("File image exists on sever can not add");</script>';
            //      } else {
                    move_uploaded_file($tmp_name,$Aserver.$name);
                      echo '<script type="text/javascript">alert("INSERT success");</script>';
                    mysqli_query($connect,"INSERT INTO sanpham (tensp,giasp,thongtinsp,hinhanh,matheloai,maqt,trangthaisp)
                                VALUES ('$tensp','$giasp','$thongtinsp','$path$name','$matheloai','$maqt','1')");
                //  }
           }
        }else{
           // không phải file ảnh
           echo '<script type="text/javascript">alert("Kiểu file không hợp lệ");</script>';
        }
   }else{
         echo '<script type="text/javascript">alert("vui lòng chọn file ảnh");</script>';
   }
}
?>
