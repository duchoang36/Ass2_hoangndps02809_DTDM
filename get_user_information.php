<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$tendn =$_GET["tendn"];
    $result = mysql_query("
	SELECT *  FROM 
	khachhang
	WHERE 
	tendn = '$tendn'  
	")or die(mysql_error());
	            
if (mysql_num_rows($result) > 0) {
    $response["khachhang"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tungthongtin = array();
        $tungthongtin["makh"] = $row["makh"];
		$tungthongtin["tenkh"] = $row["tenkh"];
        $tungthongtin["tendn"] = $row["tendn"];
        $tungthongtin["diachi"] = $row["diachi"];
		$tungthongtin["email"] = $row["email"];
$tungthongtin["sdt"] = $row["sdt"];
$tungthongtin["trangthaikh"] = $row["trangthaikh"];
 $tungthongtin["hinhanh"] = $row["hinhanh"];
array_push($response["khachhang"], $tungthongtin);
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
