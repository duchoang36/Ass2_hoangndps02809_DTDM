<?php
$con=mysqli_connect("host1.vietnix.vn","cornerco","7q7tkMZj06","cornerco_t3hdbnew");
$tendn = $_GET["tendn"];
$makh = $_GET["makh"];
$sql="SELECT * FROM khachhang WHERE tendn like $tendn";
$check_select =mysqli_query($con, $sql); 
$numrows=mysqli_num_rows($check_select);
if($numrows > 0){
$sql1="SELECT * FROM donhang WHERE makh = $makh and trangthaidh like 'chuaduyet'";
$check_select1 =mysqli_query($con, $sql1); 
$numrow1=mysqli_num_rows($check_select1);
if( $numrow1 > 0){
$result = mysqli_query($con,"INSERT INTO chitietdonhang (soluong, gia, madh, masp)  VALUES ( 12, 15000, 1, 1)");
}
{
$resultgiohang = mysqli_query($con,"INSERT INTO donhang (ngaylapdh,tongtien, ghichu,trangthaidh, makh) VALUES ( NOW(), 15000, 'nothing','chuaduyet',8)");
}
}
else{
echo '{"query_result":"UNDEFINE"}';
}
if($result == true) {
    echo '{"query_result":"SUCCESS"}';
}
else{
    echo '{"query_result":"FAILURE"}';
}
if($resultgiohang == true){
echo '{"query_result":"GIOHANGSUCCESS"}';}
else{
echo '{"query_result":"GIOHANGFAILURE"}';}
mysqli_close($con);
?>
