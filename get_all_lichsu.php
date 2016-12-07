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

$result = mysql_query("SELECT admin.maadmin, admin.tenadmin, lichsuhoatdong.malichsuhoatdong,lichsuhoatdong.maadmin,
lichsuhoatdong.idnoidunghanhdong,lichsuhoatdong.idnoidungtheloai,lichsuhoatdong.currentdate ,lichsuhoatdong.tennoidung,
noidunghanhdong.idnoidunghanhdong, noidunghanhdong.noidunghanhdong,noidungtheloai.idnoidungtheloai,noidungtheloai.noidungtheloai
FROM noidungtheloai, noidunghanhdong, admin , lichsuhoatdong
where lichsuhoatdong.idnoidunghanhdong = noidunghanhdong.idnoidunghanhdong and lichsuhoatdong.maadmin = admin.maadmin and lichsuhoatdong.idnoidungtheloai = noidungtheloai.idnoidungtheloai") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    $response["lichsu"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tungtheloai = array();
		
		$tungtheloai["tenadmin"] = $row["tenadmin"];
        $tungtheloai["noidunghanhdong"] = $row["noidunghanhdong"];
        $tungtheloai["noidungtheloai"] = $row["noidungtheloai"];
		$tungtheloai["currentdate"] = $row["currentdate"];
		$tungtheloai["tennoidung"] = $row["tennoidung"];
        
        array_push($response["lichsu"], $tungtheloai);
    }
    // success
    $response["success"] = 1;
	mysql_set_charset('utf8');
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No product  found";

    // echo no users JSON
    echo json_encode($response);
}
?>
