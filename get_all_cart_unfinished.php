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
	donhang,khachhang
	WHERE 
	donhang.makh IN (SELECT makh from khachhang where tendn = '$tendn') and
	donhang.trangthaidh like 'daduyet'
	")or die(mysql_error());
	            

if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
        $tungsanpham["madh"] = $row["madh"];
		$tungsanpham["ngaylapdh"] = $row["ngaylapdh"];
        $tungsanpham["tongtien"] = $row["tongtien"];
        $tungsanpham["hinhanh"] = $row["hinhanh"];
		$tungsanpham["ghichu"] = $row["ghichu"];
		$tungsanpham["trangthaidh"] = $row["trangthaidh"];
        array_push($response["sanpham"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
