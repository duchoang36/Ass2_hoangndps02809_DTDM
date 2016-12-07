<?php


    $tendn = $_POST["tendn"];
    $sdt = $_POST["sdt"];
     $tenkh = $_POST["tenkh"];
 $diachi = $_POST["diachi"];
$gioitinh = $_POST["gioitinh"];
  require_once('db_connect.php');

   $db = new DB_CONNECT();

    $result = mysql_query("Update khachhang set tenkh = '$tenkh', diachi = '$diachi' , sdt= '$sdt', gioitinh = '$gioitinh' where  tendn = '$tendn'")or die(mysql_error());

    if ($result == true) {
      
        echo 'thanhcong';
    } else {
        echo 'thatbai';
} 
?>
