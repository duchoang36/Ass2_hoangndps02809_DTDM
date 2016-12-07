<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$tongtiendonhang = mysql_query("SELECT SUM(tongtien) AS tongdoanhthu FROM donhang where (trangthaidh like 'daduyet') AND (ngaylapdh BETWEEN CAST('$ngaybatdau' AS DATE) 
AND CAST('$ngayketthuc' AS DATE))") or die(mysql_error());
$mang=array();
while ($row=  mysql_fetch_array($tongtiendonhang)){
    $tongdoanhthu=$row["tongdoanhthu"];
    array_push($mang,new TongTienDonHang($tongdoanhthu));
}

echo json_encode($mang);
class TongTienDonHang{
    var $tongdoanhthu;
    function TongTienDonHang($tong){
        $this->tongdoanhthu=$tong;
    }
}