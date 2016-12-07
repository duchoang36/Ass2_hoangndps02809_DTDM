<?php
$con=mysqli_connect("host1.vietnix.vn","cornerco","7q7tkMZj06","cornerco_t3hdbnew");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$tenkh = $_GET['tenkh'];
$tendn = $_GET['tendn'];
$matkhau = md5($_GET['matkhau']);
$diachi = $_GET['diachi'];
$gioitinh = $_GET['gioitinh'];
$sdt = $_GET['sdt'];
$email = $_GET['email'];
$defaultimage = 'http://25corner.com/imageuploaded/noavatar.png';
$sql="SELECT * FROM khachhang WHERE tendn = '$tendn'";

$check_select =mysqli_query($con, $sql); 
$numrows=mysqli_num_rows($check_select);

if($numrows > 0){

echo '{"query_result":"USERNAME"}';

}

else{
$sql1="SELECT * FROM khachhang WHERE email = '$email'";
$check_select1 =mysqli_query($con, $sql1); 
$numrows1=mysqli_num_rows($check_select1);
if($numrows1 >0){
 echo '{"query_result":"FAILUREEMAIL"}';
}
else{
mysql_set_charset('utf8');
$result = mysqli_query($con,"INSERT INTO khachhang (tenkh, tendn, matkhau, diachi, gioitinh,sdt,email,hinhanh,ngaydangky) 
          VALUES ( '$tenkh', '$tendn', '$matkhau',  '$diachi', '$gioitinh', '$sdt', '$email','$defaultimage',CURRENT_TIMESTAMP)");
}
}


if($result == true) {
    echo '{"query_result":"SUCCESS"}';
}
else{
    echo '{"query_result":"FAILURE"}';
}
mysqli_close($con);
?>
