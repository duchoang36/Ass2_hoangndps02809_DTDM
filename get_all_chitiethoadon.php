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

$result = mysql_query("SELECT hoadon.mahoadon, khachhang.tenkhachhang, sanpham.tensanpham, chitiethoadon.soluong, hoadon.trigia
FROM hoadon, sanpham, chitiethoadon, khachhang, khochuamasanpham
WHERE hoadon.mahoadon = chitiethoadon.mahoadon
AND chitiethoadon.machitiethoadon = khochuamasanpham.machitiethoadon
AND hoadon.makhachhang = khachhang.makhachhang
AND khochuamasanpham.masanpham = sanpham.masanpham") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["chitiethoadon"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungchitiethoadon = array();
        $tungchitiethoadon["mahoadon"] = $row["mahoadon"];
	$tungchitiethoadon["tenkhachhang"] = $row["tenkhachhang"];
        $tungchitiethoadon["tensanpham"] = $row["tensanpham"];
	$tungchitiethoadon["soluong"] = $row["soluong"];
	$tungchitiethoadon["trigia"] = $row["trigia"];


        array_push($response["chitiethoadon"], $tungchitiethoadon);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No the loai  found";

    // echo no users JSON
    echo json_encode($response);
}
?>
