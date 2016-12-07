<?php
$response = array();
require_once('db_connect.php');

$db = new DB_CONNECT();
$tentheloai = $_GET['tentheloai'];
    
    $result = mysql_query("
	SELECT  *  FROM 
	sanpham,theloai
	WHERE 
sanpham.trangthaisp = 1 and
	sanpham.matheloai = theloai.matheloai and
	theloai.tentheloai = '$tentheloai'
	");

if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungsanpham = array();
        $tungsanpham["masp"] = $row["masp"];
		$tungsanpham["tensp"] = $row["tensp"];
        $tungsanpham["tentheloai"] = $row["tentheloai"];
$tungsanpham["giasp"] = $row["giasp"];
        $tungsanpham["hinhanh"] = $row["hinhanh"];
		$tungsanpham["ngaythem"] = $row["ngaythem"];
		$tungsanpham["tentheloai"] = $row["tentheloai"];
        array_push($response["sanpham"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No Cam nang found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
