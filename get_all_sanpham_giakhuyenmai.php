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

$result = mysql_query("SELECT sanpham.masanpham,sanpham.tensanpham ,ROUND(sanpham.giasanpham*sanpham.khuyenmai,-1) as giakhuyenmai,
sanpham.giasanpham, sanpham.hinhanhsanpham, sanpham.ngaytaosanpham, theloai.tenloaisanpham,
 sanpham.khuyenmai,sanpham.maloaisanpham  , theloai.tenloaisanpham, admin.maadmin ,admin.tenadmin
FROM sanpham, theloai, admin 
where sanpham.maloaisanpham = theloai.maloaisanpham and sanpham.maadmin = admin.maadmin and (sanpham.khuyenmai BETWEEN 0.1 AND 0.99) ") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungsanpham = array();
        $tungsanpham["masanpham"] = $row["masanpham"];
		$tungsanpham["tenadmin"] = $row["tenadmin"];
        $tungsanpham["tensanpham"] = $row["tensanpham"];
        $tungsanpham["giasanpham"] = $row["giasanpham"];
		$tungsanpham["giakhuyenmai"] = $row["giakhuyenmai"];
		$tungsanpham["hinhanhsanpham"] = $row["hinhanhsanpham"];
        $tungsanpham["ngaytaosanpham"] = $row["ngaytaosanpham"];
		$tungsanpham["khuyenmai"] = $row["khuyenmai"];
        $tungsanpham["tenloaisanpham"] = $row["tenloaisanpham"];

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
