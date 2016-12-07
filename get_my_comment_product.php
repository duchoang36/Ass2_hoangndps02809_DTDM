<?php
$response = array();
require_once('db_connect.php');
$db = new DB_CONNECT();
$masanpham = $_GET["masp"];
$tendn = $_GET["tendn"];
$result = mysql_query("SELECT 
sanpham.masp,
khachhang.makh,khachhang.tenkh,khachhang.tendn,
danhgia.sao,danhgia.binhluan,danhgia.ngaydanhgia,danhgia.masp,danhgia.makh,danhgia.madanhgia
FROM sanpham,khachhang,danhgia
where khachhang.makh = danhgia.makh and danhgia.masp = sanpham.masp and sanpham.masp = $masanpham and khachhang.tendn = '$tendn'") or die(mysql_error());
if (mysql_num_rows($result) > 0) {
    $response["comment"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $comment = array();
 $comment["madanhgia"] = $row["madanhgia"];
 $comment["tendn"] = $row["tendn"];
        $comment["sao"] = $row["sao"];
        $comment["binhluan"] = $row["binhluan"];
		$comment["ngaydanhgia"] = $row["ngaydanhgia"];
        array_push($response["comment"], $comment);
    }
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
$response["comment"] = array();
	$nocomment = array();
 $nocomment["madanhgia"] = '0';
 $nocomment["tendn"] = '';
        $nocomment["sao"] = ' 0';
        $nocomment["binhluan"] = '';
	$nocomment["ngaydanhgia"] = '';
        array_push($response["comment"], $nocomment);
    $response["success"] = 0;
    $response["message"] = "No product  found";
    echo json_encode($response);
}
?>
