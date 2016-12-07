<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$tongsanpham = mysql_query("SELECT COUNT(*)AS tongsp FROM sanpham where ngaythem BETWEEN CAST('$ngaybatdau' AS DATE) 
AND CAST('$ngayketthuc' AS DATE)") or die(mysql_error());
$mang=array();
while ($row=  mysql_fetch_array($tongsanpham)){
    $tongsp=$row["tongsp"];
    array_push($mang,new TongSanPham($tongsp));
}

echo json_encode($mang);
class TongSanPham{
    var $tongsp;
    function TongSanPham($tong){
        $this->tongsp=$tong;
    }
}