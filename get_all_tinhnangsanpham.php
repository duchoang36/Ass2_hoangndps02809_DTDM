Editing:  
/home/cornerco/public_html/get_all_chitietsanpham.php
 Encoding:    Re-open Use Code Editor     Close  Save Changes

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

$result = mysql_query("SELECT * FROM tinhnangsanpham") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["tinhnang"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungtinhnang = array();
        $tungtinhnang["matinhnang"] = $row["matinhnang"];
	$tungtinhnang ["bonhotrong"] = $row["bonhotrong"];
        $tungtinhnang ["camera"] = $row["camera"];
	$tungtinhnang ["dophangiaimanhinh"] = $row["dophangiaimanhinh"];
	$tungtinhnang ["hedieuhanh"] = $row["hedieuhanh"];
	$tungtinhnang ["kichthuocsanpham"] = $row["kichthuocsanpham"];
$tungtinhnang ["machitietsanpham"] = $row["machitietsanpham"];
$tungtinhnang ["pin"] = $row["pin"];
$tungtinhnang ["ram"] = $row["ram"];


        array_push($response["tinhnang"], $tungtinhnang );
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No the loai  found";

    // echo no users JSON
    echo json_encode($response);
}
?>

