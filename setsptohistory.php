<?php
require_once('db_connect.php');
// connecting to db
$db = new DB_CONNECT();
$tendn = $_POST["tendn"];
$tensp = $_POST["tensp"];
    $result = mysql_query("SELECT * FROM khachhang WHERE tendn = '$tendn'")or die(mysql_error());
    
if (mysql_num_rows($result) > 0) {
$result1 = mysql_query("SELECT * FROM lichsuxemsp WHERE makh IN (Select makh from khachhang where tendn = '$tendn')  and masp IN (Select masp from sanpham where tensp = '$tensp')and solanxem > 0 ")or die(mysql_error());
	if(mysql_num_rows($result1) > 0){
$resultupdate = mysql_query("Update lichsuxemsp set solanxem = solanxem +1  where  makh IN (Select makh from khachhang where tendn = '$tendn')  and  masp IN (Select masp from sanpham where tensp = '$tensp')")or die(mysql_error());			
	if($resultupdate ==true){
	echo'ghinhan';}}
	else{
	$resultgiohang = mysql_query("INSERT INTO lichsuxemsp (makh, masp,solanxem) VALUES ((Select makh from khachhang where tendn = '$tendn') ,(Select masp from sanpham where tensp = '$tensp'),1)")or die(mysql_error());
if($resultgiohang ==true){
echo'ok';}}

	}
else
{echo 'vuilongdangnhap';}

?>
