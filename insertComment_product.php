<?php
require_once('db_connect.php');
$db = new DB_CONNECT();
$comment = $_POST["comment"];
$sao = $_POST["sao"];
$tensp = $_POST["tensp"];
$tendn = $_POST["tendn"];

$resultokhe = mysql_query("INSERT INTO danhgia(sao, binhluan, ngaydanhgia,masp,makh) VALUES('$sao', '$comment', CURRENT_TIMESTAMP, (Select masp from sanpham where tensp = '$tensp'),(Select makh from khachhang where tendn = '$tendn'))")or die(mysql_error());

  echo 'thanhcong';

?>
