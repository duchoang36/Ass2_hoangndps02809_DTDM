<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$tongkhachhang = mysql_query("SELECT COUNT(*)AS tongkh FROM khachhang where ngaydangky BETWEEN CAST('$ngaybatdau' AS DATE) 
AND CAST('$ngayketthuc' AS DATE)") or die(mysql_error());
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