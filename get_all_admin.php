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

$result = mysql_query("SELECT * FROM admin, gioitinh where admin.magioitinh = gioitinh.magioitinh") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["admin"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungadmin = array();
        $tungadmin["maadmin"] = $row["maadmin"];
        $tungadmin["tendangnhapadmin"] = $row["tendangnhapadmin"];
        $tungadmin["tenadmin"] = $row["tendangnhapadmin"];
		$tungadmin["ngaysinh"] = $row["ngaysinh"];
        $tungadmin["sodienthoai"] = $row["sodienthoai"];
		$tungadmin["tengioitinh"] = $row["tengioitinh"];
        $tungadmin["email"] = $row["email"];

        array_push($response["admin"], $tungadmin);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No admin  found";

    // echo no users JSON
    echo json_encode($response);
}
?>
