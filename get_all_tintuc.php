<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();

$result = mysql_query("SELECT * FROM tintucsanpham") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["tintucsanpham"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungtintucsanpham = array();
        $tungtintucsanpham["matintuc"] = $row["matintuc"];
        $tungtintucsanpham["maadmin"] = $row["maadmin"];
		$tungtintucsanpham["tieude"] = $row["tieude"];
		$tungtintucsanpham["noidung"] = $row["noidung"];
		$tungtintucsanpham["ngaytao"] = $row["ngaytao"];
		$tungtintucsanpham["machitietsanpham"] = $row["machitietsanpham"];
        array_push($response["tintucsanpham"], $tungtintucsanpham);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No tin tuc  found";

    // echo no users JSON
    echo json_encode($response);
}
?>
