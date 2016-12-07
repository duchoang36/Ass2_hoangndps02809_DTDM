<?php
    $madanhgia = $_POST["madanhgia"];
    $sao = $_POST["sao"];
    $binhluan = $_POST["binhluan"];
    require_once('db_connect.php');
$db = new DB_CONNECT();

    $result = mysql_query("UPDATE danhgia SET sao = '$sao' , binhluan = '$binhluan' WHERE madanhgia = $madanhgia")or die(mysql_error());

    if ($result == true) {
       echo 'ok';
    } else {
        echo 'fail';
    }
?>
