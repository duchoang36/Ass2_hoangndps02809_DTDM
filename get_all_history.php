<?php
$response = array();

require_once('db_connect.php');

$db = new DB_CONNECT();
$tendn = $_GET["tendn"];
$result = mysql_query("SELECT sanpham.masp,sanpham.tensp,
sanpham.giasp, sanpham.hinhanh, sanpham.ngaythem,sanpham.matheloai, sanpham.maqt,sanpham.trangthaisp,
khachhang.makh,khachhang.tenkh
FROM sanpham, lichsuxemsp, khachhang
where sanpham.masp = lichsuxemsp.masp and lichsuxemsp.makh = khachhang.makh and lichsuxemsp.makh IN (SELECT makh from khachhang where tendn = '$tendn')") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungsanpham = array();
$tungsanpham["masp"] = $row["masp"];
		$tungsanpham["tensp"] = $row["tensp"];
        $tungsanpham["giasp"] = $row["giasp"];
		$tungsanpham["trangthaisp"] = $row["trangthaisp"];
        $tungsanpham["hinhanh"] = $row["hinhanh"];
        array_push($response["sanpham"], $tungsanpham);
    }
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
	$response["sanpham"] = array();
 $response["success"] = 0;
    $response["message"] = "No product  found";
$tungsanpham1["masp"] = $row["masp"];
   $tungsanpham1["tensp"] = 'Bạn chưa xem sản phẩm nào';
        $tungsanpham1["giasp"] = '0';
		$tungsanpham1["trangthaisp"] = '0';
        $tungsanpham1["hinhanh"] = '';
 array_push($response["sanpham"], $tungsanpham1);
    echo json_encode($response);
}
?>
