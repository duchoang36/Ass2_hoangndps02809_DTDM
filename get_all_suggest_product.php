<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$tendn = $_GET["tendn"];
    $result = mysql_query("
	SELECT *,trangthaisp  FROM 
	lichsuxemsp,khachhang,sanpham
	WHERE 
	lichsuxemsp.makh = khachhang.makh and
	lichsuxemsp.makh IN (SELECT makh from khachhang where tendn ='$tendn') and
	lichsuxemsp.masp = sanpham.masp
	")or die(mysql_error());
	            
if (mysql_num_rows($result) > 0) {
    $response["goiy"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
		$tungsanpham["masp"] = $row["masp"];
        $tungsanpham["tensp"] = $row["tensp"];
$tungsanpham["giasp"] = $row["giasp"];
$tungsanpham["trangthaisp"] = $row["trangthaisp"];
$tungsanpham["hinhanh"] = $row["hinhanh"];
array_push($response["goiy"], $tungsanpham);
    }
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No product found";
 $response["goiy"] = array();
$tungsanpham["masp"] = '';
        $tungsanpham["tensp"] = 'Hiện chưa có thông tin';
$tungsanpham["giasp"] = 0;
$tungsanpham["hinhanh"] = '';
array_push($response["goiy"], $tungsanpham);
    echo json_encode($response);
}
?>
