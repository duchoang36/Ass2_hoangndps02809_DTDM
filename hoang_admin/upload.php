<?php include $Link = 'database.php'; ?>
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
                echo "File không được lớn hơn 1mb";
            }else{
                // file hợp lệ, tiến hành upload
                $tensanpham=$_POST['tensanpham'];
                $gia=$_POST['gia'];
                $theloai = $_POST['theloai'];
                
                $Aserver = "photos/";
                $path = "http://25corner.com/hoang_admin/photos/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type'];
                $size = $_FILES['file']['size'];
                // Upload file
                if (file_exists($Aserver.$name)) {
                    echo "File $Aserver.$name exists on server";
                  } else {
                    move_uploaded_file($tmp_name,$Aserver.$name);
                      echo "The file $Aserver.$name not exists";
                    mysqli_query($connect,"INSERT INTO sanpham (tensanpham,gia,hinhanh,theloai)
                                VALUES ('$tensanpham','$gia','$path$name','$theloai')");
                  }
           }
        }else{
           // không phải file ảnh
           echo "Kiểu file không hợp lệ";
        }
   }else{
        echo "Vui lòng chọn file";
   }
}
?>
