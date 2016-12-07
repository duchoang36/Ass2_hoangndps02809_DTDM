<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$keyword = $_GET["keyword"];
    $result = mysql_query("
	SELECT *  FROM 
	sanpham, quantri ,theloai
	WHERE 
	sanpham.tensp like '%$keyword%'  and
	quantri.maqt = sanpham.maqt  and
	theloai.matheloai = sanpham.matheloai
	")or die(mysql_error());
	            
if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
        $tungsanpham["masp"] = $row["masp"];
		$tungsanpham["tensp"] = $row["tensp"];
        $tungsanpham["giasp"] = $row["giasp"];
        $tungsanpham["hinhanh"] = $row["hinhanh"];
		$tungsanpham["ngaythem"] = $row["ngaythem"];
		$tungsanpham["trangthaisp"] = $row["trangthaisp"];
		$tungsanpham["tentheloai"] = $row["tentheloai"];
$tungsanpham["soluong"] = $row["soluong"];
        $tungsanpham["tenqt"] = $row["tenqt"];
        array_push($response["sanpham"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
$response["sanpham"] = array();

      $tungsanpham1 = array();
$tungsanpham1["tensp"] = 'Chưa có thông tin';
$tungsanpham1["masp"] = '';
$tungsanpham1["giasp"] = '0';
        $tungsanpham1["hinhanh"] = '';
		$tungsanpham1["trangthaisp"] = '0';
    $response["success"] = 0;
    $response["message"] = "No product found";
 array_push($response["sanpham"], $tungsanpham1);
   
    echo json_encode($response);
}
?>
