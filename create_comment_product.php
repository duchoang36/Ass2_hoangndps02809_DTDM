<?php

$response = array();
    $comment = $_POST["comment"];
    $sao = $_POST["sao"];
     $masp = $_POST["masp"];
 $tendn = $_POST["tendn"];
  require_once('db_connect.php');
   $db = new DB_CONNECT();
    $result = mysql_query("INSERT INTO danhgia(sao, binhluan, ngaydanhgia,masp,makh) VALUES($sao, '$comment',CURRENT_TIMESTAMP, '$masp',(Select makh from khachhang where tendn = '$tendn'))")or die(mysql_error());

    if ($result) {
        
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}
?>
