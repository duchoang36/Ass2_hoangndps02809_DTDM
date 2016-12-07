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

$result = mysql_query("SELECT danhgia.madanhgia, danhgia.makhachhang, danhgia.tieudesanpham , danhgia.sosaodanhgia ,danhgia.noidungbinhluan,danhgia.ngaydanhgia,
admin.maadmin ,admin.tenadmin,
trangthaidanhgia.matrangthaidanhgia, trangthaidanhgia.madanhgia, trangthaidanhgia.trangthai, trangthaidanhgia.maadmin,
khachhang.makhachhang, khachhang.tenkhachhang
FROM danhgia, admin, trangthaidanhgia , khachhang 
where danhgia.makhachhang = khachhang.makhachhang") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungsanpham = array();
        $tungsanpham["madanhgia"] = $row["madanhgia"];
		$tungsanpham["tenkhachhang"] = $row["tenkhachhang"];
        $tungsanpham["tieudesanpham"] = $row["tieudesanpham"];
        $tungsanpham["sosaodanhgia"] = $row["sosaodanhgia"];
		$tungsanpham["noidungbinhluan"] = $row["noidungbinhluan"];
		$tungsanpham["ngaydanhgia"] = $row["hinhanhsanpham"];

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
