<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$tendn = $_GET["tendn"];
    $result = mysql_query("
	SELECT spyeuthich.masp,spyeuthich.makh,
	sanpham.masp,sanpham.giasp,sanpham.hinhanh,sanpham.tensp,sanpham.trangthaisp,khachhang.tenkh,khachhang.makh  FROM 
	spyeuthich,sanpham,khachhang
	WHERE 
	spyeuthich.makh IN (Select makh from khachhang where tendn = '$tendn') and
	spyeuthich.masp =sanpham.masp and
 	khachhang.makh =  spyeuthich.makh
	")or die(mysql_error());
	            
if (mysql_num_rows($result) > 0) {
    $response["khachhang"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
		$tungsanpham["tenkh"] = $row["tenkh"];
$tungsanpham["masp"] = $row["masp"];
$tungsanpham["giasp"] = $row["giasp"];
$tungsanpham["hinhanh"] = $row["hinhanh"];
$tungsanpham["trangthaisp"] = $row["trangthaisp"];
        $tungsanpham["tensp"] = $row["tensp"];
array_push($response["khachhang"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
        $response["khachhang"] = array();
    	
        $tungsanpham1 = array();
$tungsanpham1["tenkh"] = '';
$tungsanpham1["masp"] = '';
$tungsanpham1["giasp"] = '0';
$tungsanpham1["hinhanh"] = '';
$tungsanpham1["trangthaisp"] ='0';
        $tungsanpham1["tensp"] = 'Chưa có thông tin';
array_push($response["khachhang"], $tungsanpham1);
    $response["success"] = 0;
    $response["message"] = "No product found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
