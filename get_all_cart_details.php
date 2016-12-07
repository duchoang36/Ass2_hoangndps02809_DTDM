<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$tendn = $_GET["tendn"];
    $result = mysql_query("
	SELECT *  FROM 
	donhang, chitietdonhang, sanpham
	WHERE 
	donhang.madh = chitietdonhang.madh and 
	donhang.makh IN(Select makh from khachhang where tendn = '$tendn') and
	donhang.trangthaidh like 'chuaduyet' and
	chitietdonhang.masp = sanpham.masp
	")or die(mysql_error());
	            
if (mysql_num_rows($result) > 0) {
    $response["donhang"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
        $tungsanpham["madh"] = $row["madh"];
		$tungsanpham["soluong"] = $row["soluong"];
        $tungsanpham["gia"] = $row["gia"];
        $tungsanpham["tensp"] = $row["tensp"];
		$tungsanpham["hinhanh"] = $row["hinhanh"];
        array_push($response["donhang"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No details cart found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
