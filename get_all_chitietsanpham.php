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

$result = mysql_query("SELECT * FROM chitietsanpham") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["chitietsanpham"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungchitietsanpham = array();
        $tungchitietsanpham["machitietsanpham"] = $row["machitietsanpham"];
	$tungchitietsanpham["masanpham"] = $row["masanpham"];
        $tungchitietsanpham["matinhnang"] = $row["matinhnang"];
	$tungchitietsanpham["motanhanhsanpham"] = $row["motanhanhsanpham"];
	$tungchitietsanpham["thongsokythuat"] = $row["thongsokythuat"];
	$tungchitietsanpham["thongtinbaohanh"] = $row["thongtinbaohanh"];


        array_push($response["chitietsanpham"], $tungchitietsanpham);
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
