<?php
// include db connect class
require_once('test_db_connect.php');

// connecting to db
$db = new DB_CONNECT();

//$action  = $_POST["action"];
//if($action == "insert"){
	$tensanpham = $_POST["tensanpham"];
	$gia = $_POST["gia"];
	$hinhanh = $_POST["hinhanh"];
	$qr = "
			INSERT INTO sanpham VALUES(
				null,
				'$tensanpham',
				'$gia',
				'$hinhanh'
			)
	";
	//mysql_set_charset($tensanpham,'utf8');
	mysql_query($qr);
	$id = mysql_insert_id();
	echo "INSERT THANH CONG $id" ;
//}
?>