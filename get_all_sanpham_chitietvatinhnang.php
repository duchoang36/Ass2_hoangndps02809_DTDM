<?php
// array for JSON response
$response = array();


// include db connect class
require_once('db_connect.php');

// connecting to db
$db = new DB_CONNECT();

if (isset($_GET["masanpham"])) {
    $masanpham = $_GET['masanpham'];
    $result = mysql_query("
	SELECT * FROM 
	sanpham, chitietsanpham,danhgia,trangthaidanhgia, khachhang
	WHERE 
	sanpham.masanpham = chitietsanpham.masanpham and 
	danhgia.masanpham = $masanpham and
	sanpham.trangthaisp = 1 and
	danhgia.makhachhang = khachhang.makhachhang and
	danhgia.madanhgia = trangthaidanhgia.madanhgia and
	trangthaidanhgia.trangthai like '1'
	
	");

    if (!empty($result)) {
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $tungsanpham = array();
            $tungsanpham["masanpham"] = $result["masanpham"];
            $tungsanpham["tensanpham"] = $result["tensanpham"];
			$tungsanpham["giasanpham"] = $result["giasanpham"];
			$tungsanpham["khuyenmai"] = $result["khuyenmai"];
			$tungsanpham["ngaytaosanpham"] = $result["ngaytaosanpham"];
            $tungsanpham["giakhuyenmai"] = $result["giakhuyenmai"];
            $tungsanpham["hinhanhsanpham"] = $result["hinhanhsanpham"];
			 $tungsanpham["tenloaisanpham"] = $result["tenloaisanpham"];
			$tungsanpham["tenadmin"] = $result["tenadmin"];
            // success
            $response["success"] = 1;
            $response["sanpham"] = array();

            array_push($response["sanpham"], $tungsanpham);

            // echoing JSON response
			mysql_set_charset('utf8');
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No product found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 1.5;
        $response["message"] = "No product found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
