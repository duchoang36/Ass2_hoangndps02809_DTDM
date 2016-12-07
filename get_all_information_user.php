<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();
$tendn = $_GET["tendn"];
    $result = mysql_query("
	SELECT *  FROM 
	khachhang
	WHERE 
	khachhang.tendn = '$tendn'
	")or die(mysql_error());
	            

if (mysql_num_rows($result) > 0) {
    $response["khachhang"] = array();
    	
    while ($row = mysql_fetch_array($result)) {
        $tunguser = array();
        $tunguser["tenkh"] = $row["tenkh"];
		$tunguser["sdt"] = $row["sdt"];
        $tunguser["diachi"] = $row["diachi"];
        array_push($response["khachhang"], $tunguser);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
 
    // echo no users JSON
    echo json_encode($response);
}
?>
