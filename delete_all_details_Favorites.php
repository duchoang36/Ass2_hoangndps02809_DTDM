<?php
require_once('db_connect.php');
// connecting to db
$db = new DB_CONNECT();
$tendn = $_POST["tendn"];
$tensp = $_POST["tensp"];
    $result = mysql_query("SELECT * FROM khachhang WHERE tendn = '$tendn' ")or die(mysql_error());
    
if (mysql_num_rows($result) > 0) {
$result1 = mysql_query("SELECT * FROM spyeuthich WHERE makh IN (Select makh from khachhang where tendn = '$tendn') and masp IN (Select masp from sanpham where tensp = '$tensp')")or die(mysql_error());
	if(mysql_num_rows($result1) > 0){
			$resultcheck = mysql_query("DELETE FROM spyeuthich WHERE makh IN (Select makh from khachhang where tendn = '$tendn') and masp IN (Select masp from sanpham where tensp = '$tensp')")or die(mysql_error());
if($resultcheck==true){
echo 'xoathanhcong';
}
	}
	}else{echo 'noproductfound';}

?>
