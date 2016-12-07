<?php

 $ghichu = $_POST["ghichu"];
    $tendn = $_POST["tendn"];
    $tongtien = $_POST["tongtien"];
  require_once('db_connect.php');

   $db = new DB_CONNECT();

    $result = mysql_query("Update donhang set tongtien = $tongtien , trangthaidh = 'dangchoduyet', ghichu = '$ghichu' where  makh IN ( SELECT makh from  khachhang where tendn = '$tendn') and trangthaidh like 'chuaduyet'")or die(mysql_error());

    if ($result == true) {
      
        echo 'thanhcong';
    } else {
        echo 'thatbai';
} 
?>
