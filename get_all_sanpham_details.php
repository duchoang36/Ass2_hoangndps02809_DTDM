<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$masanpham = $_GET["masp"];
    $result = mysql_query("
	SELECT *  FROM 
	sanpham, quantri ,theloai
	WHERE 
	sanpham.masp = $masanpham  and
	quantri.maqt = sanpham.maqt  and
	theloai.matheloai = sanpham.matheloai
	")or die(mysql_error());
	            

if (mysql_num_rows($result) > 0) {
    $response["sanpham"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungsanpham = array();
        $tungsanpham["masp"] = $row["masp"];
		$tungsanpham["tensp"] = $row["tensp"];
        $tungsanpham["giasp"] = $row["giasp"];
        $tungsanpham["hinhanh"] = $row["hinhanh"];
 $tungsanpham["trangthaisp"] = $row["trangthaisp"];
		$tungsanpham["thongtinsp"] = $row["thongtinsp"];
		$tungsanpham["tentheloai"] = $row["tentheloai"];
        array_push($response["sanpham"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
