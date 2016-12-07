<?php
require_once('db_connect.php');
// connecting to db
$db = new DB_CONNECT();
$tensp = $_POST["tensp"];
$tendn = $_POST["tendn"];
    $result = mysql_query("SELECT masp, makh FROM spyeuthich  WHERE masp IN (SELECT masp from sanpham where tensp = '$tensp') and makh IN(SELECT makh from khachhang where tendn = '$tendn')")or die(mysql_error());
    
if (mysql_num_rows($result) > 0) {
//$result1 = mysql_query("SELECT * FROM `donhang` WHERE makh = '$makh'  and trangthaidh like 'chuaduyet' ")or die(mysql_error());
//	if(mysql_num_rows($result1) > 0){
echo 'dacosanphamyeuthich';
//}
// (Select masp from sanpham where tensp = '$tensp')
//	else{
//	$resultgiohang = mysql_query("INSERT INTO `donhang` (`ngaylapdh`, `ghichu`,`trangthaidh`, `makh`) VALUES ( CURRENT_TIMESTAMP,'nothing','chuaduyet','$makh')")or die(mysql_error());
//	}
}
else{
	$resultok = mysql_query("INSERT INTO `spyeuthich` (`masp`, `makh`)  VALUES ((Select masp from sanpham where tensp = '$tensp'),(Select makh from khachhang where tendn = '$tendn'))")or die(mysql_error());
if($resultok == true ){
echo 'themsanphamvaogiohangyeuthich';
}
}
?>
