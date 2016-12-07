<?php

$response = array();
require_once('../test_db_connect_manager.php');

$db = new DB_CONNECT();


    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];

// neu nhu 2 bien co gia tri thi thuc hien lay danh sach
if (isset($ngaybatdau) && isset($ngayketthuc)) {
    

    $result = mysql_query("
	SELECT * 
FROM khachhang
WHERE ngaydangky
BETWEEN CAST( '$ngaybatdau' AS DATE ) 
AND CAST(  '$ngayketthuc' AS DATE )");

    if (mysql_num_rows($result) > 0) {
        $response["khachhang"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $tungkhachhang = array();
            $tungkhachhang["makh"] = $row["makh"];
            $tungkhachhang["tenkh"] = $row["tenkh"];
            $tungkhachhang["tenloaikh"] = $row["tenloaikh"];

            array_push($response["kh"], $tungkhachhang);
        }
        // success
        $response["success"] = 1;
        mysql_set_charset('utf8');
        echo json_encode($response);
    } else {
        // no products found
        $response["success"] = 0;
        $response["message"] = "No Cam nang found";

        // echo no users JSON
        echo json_encode($response);
    }
}

?>

