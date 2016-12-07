<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();

$result = mysql_query("SELECT sanpham.masp,sanpham.tensp,sanpham.trangthaisp,
sanpham.giasp, sanpham.hinhanh, sanpham.ngaythem,sanpham.matheloai, sanpham.maqt ,theloai.matheloai, theloai.tentheloai, quantri.maqt ,quantri.tenqt
FROM sanpham, theloai, quantri 
where sanpham.matheloai = theloai.matheloai and sanpham.maqt = quantri.maqt and sanpham.trangthaisp = 1 and theloai.tentheloai like  'Macbook' ") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungsanpham = array();
        $tungsanpham["masp"] = $row["masp"];
		$tungsanpham["tensp"] = $row["tensp"];
        $tungsanpham["giasp"] = $row["giasp"];
        $tungsanpham["hinhanh"] = $row["hinhanh"];
		$tungsanpham["ngaythem"] = $row["ngaythem"];
		$tungsanpham["tentheloai"] = $row["tentheloai"];
        $tungsanpham["tenqt"] = $row["tenqt"];
        array_push($response["sanpham"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product  found";

    // echo no users JSON
    echo json_encode($response);
}
?>
