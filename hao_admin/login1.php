<?php
require_once('connect.php');

$db = new DB_CONNECT();
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];

$result = mysql_query("SELECT * FROM login WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
   echo	"true";
    }
	else {
   echo	"false";
}
?>