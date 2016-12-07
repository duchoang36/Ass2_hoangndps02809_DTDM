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
			$resultcheck = mysql_query("SELECT *  FROM donhang, chitietdonhang where donhang.makh IN (Select makh from khachhang where tendn = '$tendn') and chitietdonhang.masp IN (Select masp from sanpham where tensp = '$tensp')and donhang.madh = chitietdonhang.madh and donhang.trangthaidh like 'chuaduyet' and chitietdonhang.soluong > 0")or die	(mysql_error());
if(mysql_num_rows($resultcheck) >0){
		echo 'dacosanphamtronggiohang';}
			
			else {
				$resultcheckinsert = mysql_query("SELECT *  FROM donhang, chitietdonhang where donhang.makh IN (Select makh from khachhang where tendn = '$tendn') and 					chitietdonhang.masp IN (Select masp from sanpham where tensp = '$tensp')and donhang.madh = chitietdonhang.madh and donhang.trangthaidh like 'chuaduyet' 				and chitietdonhang.soluong = 0")or die(mysql_error());
				if(mysql_num_rows($resultcheckinsert) > 0){
				$resultupdate = mysql_query("Update chitietdonhang , donhang  set chitietdonhang.soluong = chitietdonhang.soluong +1 where   chitietdonhang.masp IN (Select 				masp from 			sanpham where tensp = '$tensp') and chitietdonhang.madh = donhang.madh and donhang.makh  IN (Select makh from khachhang where 					tendn = '$tendn')")or 				die(mysql_error());
				if($resultupdate == true) {echo 'themsoluongsanphamthanhcong';}}
				else{
				$resultokhe = mysql_query("INSERT INTO chitietdonhang (soluong, gia, madh, masp)  VALUES (1,(Select giasp from sanpham where tensp = '$tensp'),(Select madh 					from 			donhang where makh  IN (Select makh from khachhang where tendn = '$tendn') and trangthaidh like 'chuaduyet'),(Select masp from sanpham 					where tensp = '$tensp'))")or 		die		(mysql_error());
				if($resultokhe == true) {echo 'themsanphamthanhcong';}}

			}			
	
	}
	else{
	$resultgiohang = mysql_query("INSERT INTO donhang (ngaylapdh, ghichu,trangthaidh, makh) VALUES ( CURRENT_TIMESTAMP,'nothing','chuaduyet',(Select makh from khachhang where tendn = '$tendn'))")or die(mysql_error());
		if($resultgiohang == true){
		$resultok = mysql_query("INSERT INTO chitietdonhang (soluong, gia, madh, masp)  VALUES (1,(Select giasp from sanpham where tensp = '$tensp'),(Select madh 			from donhang where makh IN(Select makh from khachhang where tendn = '$tendn') and trangthaidh like 'chuaduyet'),(Select masp from sanpham where tensp = '$tensp'))")or die(mysql_error());
		if($resultok == true) {
    echo 'taothanhcong';
}}	
	}

	}else{echo 'vuilongdangnhap';}

?>
