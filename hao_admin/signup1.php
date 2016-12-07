<?php
require_once('connect.php');

$db = new DB_CONNECT();
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];

$result = mysql_query("INSERT INTO login (taikhoan, matkhau) VALUES ('$taikhoan', '$matkhau')");

if($result == true) {
    echo 'true';
}
else{
    echo 'false';
}
?>