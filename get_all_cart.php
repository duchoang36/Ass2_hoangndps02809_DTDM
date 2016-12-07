<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$tendn = $_GET["tendn"];
    $result = mysql_query("
	SELECT chitietdonhang.soluong ,chitietdonhang.masp,chitietdonhang.madh,chitietdonhang.gia,
donhang.ngaylapdh,donhang.madh, donhang.makh,donhang.trangthaidh,
sanpham.masp,sanpham.hinhanh, sanpham.tensp,sanpham.trangthaisp,
khachhang.makh, khachhang.tendn
FROM donhang ,khachhang, chitietdonhang,sanpham
	WHERE
	donhang.makh  IN (Select makh from khachhang where tendn = '$tendn') and 
	donhang.makh = khachhang.makh and
	donhang.trangthaidh like 'chuaduyet' and
	donhang.madh = chitietdonhang.madh and
	chitietdonhang.masp = sanpham.masp and
	sanpham.trangthaisp = 1 and
	chitietdonhang.soluong > 0
	")or die(mysql_error());
	            
if (mysql_num_rows($result) > 0) {
    $response["donhang"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
		$tungsanpham["madh"] = $row["madh"];
$tungsanpham["ngaylapdh"] = $row["ngaylapdh"];
$tungsanpham["tensp"] = $row["tensp"];
$tungsanpham["hinhanh"] = $row["hinhanh"];
$tungsanpham["soluong"] = $row["soluong"];
$tungsanpham["gia"] = $row["gia"];
array_push($response["donhang"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    $response["donhang"] = array();
    	
        $tungsanpham1 = array();
		$tungsanpham1["madh"] = '';
$tungsanpham1["ngaylapdh"] = '';
$tungsanpham1["tensp"] = '';
$tungsanpham1["hinhanh"] = '';
$tungsanpham1["soluong"] = '';
$tungsanpham1["gia"] = '0';
array_push($response["donhang"], $tungsanpham1);
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
