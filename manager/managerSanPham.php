<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$sanpham = mysql_query("SELECT * FROM sanpham where ngaythem BETWEEN CAST('$ngaybatdau' AS DATE) 
AND CAST('$ngayketthuc' AS DATE)") or die(mysql_error());

$mang=array();
while ($row=  mysql_fetch_array($sanpham)){
    $masp=$row["masp"];
    $tensp=$row["tensp"];
    $giasp=$row["giasp"];
    $ngaythem=$row["ngaythem"];
    array_push($mang,new SanPham($masp,$tensp,$giasp,$ngaythem));
}

echo json_encode($mang);
class SanPham{
    var $masp;
    var $tensp;
    var $giasp;
    var $ngaythem;
    function SanPham($ma,$ten,$gia,$ngay){
        $this->masp=$ma;
        $this->tensp=$ten;
        $this->giasp=$gia;
        $this->ngaythem=$ngay;
    }
}