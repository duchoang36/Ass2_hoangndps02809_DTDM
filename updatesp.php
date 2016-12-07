<?php include  'database.php'; ?>
<?php
if(isset($_POST['ok'])){ // Người dùng đã ấn submit
    if($_FILES['file']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"){
        // là file ảnh
        // Tiến hành code upload
            if($_FILES['file']['size'] > 1048576){
                echo '<script type="text/javascript">alert("kich cỡ hình ảnh không lớn hơn 1mb");</script>';
            }else{
                // file hợp lệ, tiến hành upload
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $thongtinsp = $_POST['thongtinsp'];
                $hinhanh = $_POST['hinhanh'];
               // $soluong = $_POST['soluong'];
                $matheloai = $_POST['matheloai'];
                $maqt = $_POST['maqt'];
                $trangthaisp = $_POST['trangthaisp']!=''?1:0;
                $Aserver = "imageuploaded/";
                $path = "http://25corner.com/imageuploaded/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type'];
                $size = $_FILES['file']['size'];
                // Upload file
                    move_uploaded_file($tmp_name,$Aserver.$name);
                    mysqli_query($connect,"UPDATE sanpham  SET tensp = '$tensp', giasp = '$giasp',
											thongtinsp ='$thongtinsp',hinhanh = '$path$name',
											matheloai = '$matheloai',
										maqt='$maqt' , trangthaisp = '$trangthaisp' WHERE masp = '$masp'");
					 echo '<script type="text/javascript">alert("UPDATE success");</script>';
           }
        }else{
           // không phải file ảnh
           echo '<script type="text/javascript">alert("Kiểu file không hợp lệ");</script>';
        }
   }else{
         echo '<script type="text/javascript">alert("UPDATE FAIL , Vui lòng giảm size ảnh");</script>';
   }
}
?>
