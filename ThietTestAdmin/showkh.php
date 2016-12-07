<?php
$servername = "host1.vietnix.vn";
$username = "cornerco";
$password = "7q7tkMZj06";
$dbname = "cornerco_testadmin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM khachhang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> 
         Mã Khách Hàng : ". $row["makh"]. " <br> 
         Tên Khách Hàng : ". $row["tenkh"]. "<br>
         Tên Đăng Nhập : ". $row["tendn"]. " <br> 
         Mật Khẩu : ". $row["matkhau"]. "<br>
         Địa Chỉ : ". $row["diachi"]. " <br> 
         Giới tính : ". $row["gioitinh"]. "<br>
         SĐT : ". $row["sdt"]. " <br> 
         Email : ". $row["email"]. "<br>
         Ngày đăng ký : ". $row["ngaydangky"]. "<br>
         
         
         <br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>  