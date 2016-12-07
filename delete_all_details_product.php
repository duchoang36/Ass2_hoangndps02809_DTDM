<?php
require_once('db_connect.php');
// connecting to db
$db = new DB_CONNECT();
$tendn = $_POST["tendn"];
$tensp = $_POST["tensp"];
    $result = mysql_query("SELECT * FROM khachhang WHERE tendn = '$tendn' ")or die(mysql_error());
    
if (mysql_num_rows($result) > 0) {
$result1 = mysql_query("SELECT * FROM donhang WHERE makh IN (Select makh from khachhang where tendn = '$tendn')  and trangthaidh like 'chuaduyet' ")or die(mysql_error());
	if(mysql_num_rows($result1) > 0){
			$resultcheck = mysql_query("SELECT *  FROM donhang, chitietdonhang where donhang.makh IN (Select makh from khachhang where tendn = '$tendn') and chitietdonhang.masp IN (Select masp from sanpham where tensp = '$tensp')and donhang.madh = chitietdonhang.madh and donhang.trangthaidh like 'chuaduyet'")or die	(mysql_error());
			if(mysql_num_rows($resultcheck) >0){
$resultupdate = mysql_query("Update chitietdonhang , donhang  set chitietdonhang.soluong = 0 where   chitietdonhang.masp IN (Select masp from sanpham where tensp = '$tensp') and chitietdonhang.madh = donhang.madh and donhang.makh  IN (Select makh from khachhang where tendn = '$tendn')")or die(mysql_error());
			if($resultupdate == true) {
    echo 'gosanphamthanhcong';
}}
			
	
	}
	}else{echo 'vuilongdangnhap';}

?>
