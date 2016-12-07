<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$tongdonhang = mysql_query("SELECT COUNT(*)AS tongdh FROM donhang where (trangthaidh like 'chuaduyet') AND (ngaylapdh BETWEEN CAST('$ngaybatdau' AS DATE) 
AND CAST('$ngayketthuc' AS DATE))") or die(mysql_error());
$mang=array();
while ($row=  mysql_fetch_array($tongdonhang)){
    $tongdh=$row["tongdh"];
    array_push($mang,new TongDonHang($tongdh));
}

echo json_encode($mang);
class TongDonHang{
    var $tongdh;
    function TongDonHang($tong){
        $this->tongdh=$tong;
    }
}