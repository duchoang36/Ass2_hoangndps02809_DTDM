<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');
$tendn = $_GET["tendn"];
// connecting to db
$db = new DB_CONNECT();

$result = mysql_query("SELECT *
FROM donhang
where makh IN ( SELECT makh from  khachhang where tendn = '$tendn') and trangthaidh like 'dangchoduyet'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["donhang"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungdonhang = array();
        $tungdonhang["madh"] = $row["madh"];
		$tungdonhang["ngaylapdh"] = $row["ngaylapdh"];
        $tungdonhang["tongtien"] = $row["tongtien"];
        $tungdonhang["ghichu"] = $row["ghichu"];
        array_push($response["donhang"], $tungdonhang);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    // echoing JSON response
    echo json_encode($response);
} else {
    $response["donhang"] = array();
$tungdonhang1 = array();
        $tungdonhang1["madh"] = '';
		$tungdonhang1["ngaylapdh"] = 'Chưa có thông tin';
        $tungdonhang1["tongtien"] = '0';
        $tungdonhang1["ghichu"] = '';
        array_push($response["donhang"], $tungdonhang1);
    $response["success"] = 0;
    $response["message"] = "No product  found";

    // echo no users JSON
    echo json_encode($response);
}
?>
