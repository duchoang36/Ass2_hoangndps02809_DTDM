<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");

$tongkhachhang = mysql_query("SELECT COUNT(*)AS tongkh FROM khachhang where trangthaionline like '1'") or die(mysql_error());
$mang=array();
while ($row=  mysql_fetch_array($tongkhachhang)){
    $tongkh=$row["tongkh"];
    array_push($mang,new TongKhachHang($tongkh));
}

echo json_encode($mang);
class TongKhachHang{
    var $tongkh;
    function TongKhachHang($tong){
        $this->tongkh=$tong;
    }
}