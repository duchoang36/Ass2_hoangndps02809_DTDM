<?php

/*
 * Following code will list all the products
 */

// array for JSON response
//khai bao 1 mang
$response = array();


// include db connect class
//chay file connect.php
require_once('connect.php');

// connecting to db
//khai bao doi tuong tu file connect.php
//ten class
$db = new DB_CONNECT();

$result = mysql_query("SELECT * FROM login") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
	//khai bao 1 mang. ten la danh sach
    $response["danhsach"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
		//khai bao bien trong mang
		$haologin = array();
        $haologin["id"] = $row["id"];
		$haologin["tk"] = $row["taikhoan"];
        $haologin["mk"] = $row["matkhau"];
		//do thong tin tu data ve array
        array_push($response["danhsach"], $haologin);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    // echoing JSON response
	//thanh cong => tao ra file .json
    echo json_encode($response);
	
	//free response
	
	//free mysql connect
	
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product  found";

    // echo no users JSON
    echo json_encode($response);
}
?>