<?php
$con=mysqli_connect("host1.vietnix.vn","cornerco","7q7tkMZj06","cornerco_t3hdbnew");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$tendn = $_GET['tendn'];
$email = $_GET['email'];

$sql="SELECT * FROM khachhang WHERE tendn = '$tendn'";
$check_select =mysqli_query($con, $sql); 
$numrows=mysqli_num_rows($check_select);

if($numrows > 0){

echo 'FALL';

}

else{

$result = mysqli_query($con,"INSERT INTO khachhang (tenkh, tendn, matkhau, diachi, gioitinh,sdt,email) 
          VALUES ( '', '$tendn', '',  '', '', '', '$email')");
}


if($result == true) {
    echo 'true';
}
else{
    echo 'true';
}
mysqli_close($con);
?>
