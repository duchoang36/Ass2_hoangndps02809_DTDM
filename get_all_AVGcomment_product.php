<?php
$response = array();
require_once('db_connect.php');
$db = new DB_CONNECT();
$masanpham = $_GET["masp"];
$result = mysql_query("SELECT 
sanpham.masp,
khachhang.makh,khachhang.tenkh,sanpham.trangthaisp,
AVG(danhgia.sao)as trungbinhsao,COUNT(danhgia.binhluan) as tongsobinhluan,danhgia.ngaydanhgia,danhgia.masp,danhgia.makh
FROM sanpham,khachhang,danhgia
where khachhang.makh = danhgia.makh and danhgia.masp = $masanpham and sanpham.masp = danhgia.masp ") or die(mysql_error());
if (mysql_num_rows($result) > 0) {
    $response["comment"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $comment = array();
$comment["tongsobinhluan"] = $row["tongsobinhluan"];
$comment["trungbinhsao"] = $row["trungbinhsao"];

        array_push($response["comment"], $comment);
    }
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
$response["comment"] = array();
	$nocomment = array();
	$nocomment["tongsobinhluan"] = '0';
$nocomment["trungbinhsao"] = '0';
        array_push($response["comment"], $nocomment);
    $response["success"] = 0;
    $response["message"] = "No product  found";
    echo json_encode($response);
}
?>
