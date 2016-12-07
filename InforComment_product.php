<?php
$response = array();
require_once('db_connect.php');
$db = new DB_CONNECT();
$madanhgia= $_GET["madanhgia"];
$resultokhe = mysql_query("select  * from danhgia where madanhgia = $madanhgia")or die(mysql_error());
if (mysql_num_rows($resultokhe) > 0) {
    $response["binhluan"] = array();
    while ($row = mysql_fetch_array($resultokhe)) {
        $tungsanpham = array();
		$tungsanpham["madanhgia"] = $row["madanhgia"];
$tungsanpham["sao"] = $row["sao"];
$tungsanpham["binhluan"] = $row["binhluan"];
array_push($response["binhluan"], $tungsanpham);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    $response["binhluan"] = array();
    	
        $tungsanpham1 = array();
$tungsanpham1["madanhgia"] = '';
$tungsanpham1["sao"] = '';
$tungsanpham1["binhluan"] = '';
array_push($response["binhluan"], $tungsanpham1);
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
