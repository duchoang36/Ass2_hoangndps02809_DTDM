<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$khachhang = mysql_query("SELECT COUNT(makh) AS tongkhachhang,makh,tenkh,ngaydangky FROM khachhang where ngaydangky BETWEEN CAST('2015-01-01' AS DATE) 
AND CAST('2017-01-01' AS DATE)") or die(mysql_error());

$mang=array();
while ($row=  mysql_fetch_array($khachhang)){
    $makh=$row["makh"];
    $tenkh=$row["tenkh"];
    $ngaydangky=$row["ngaydangky"];
    $tongkhachhang=$row["tongkhachhang"];
    array_push($mang,new KhachHang($makh,$tenkh,$ngaydangky,$tongkhachhang));
}

echo json_encode($mang);
class KhachHang{
    var $makh;
    var $tenkh;
    var $ngaydangky;
    var $tongkhachhang;
    function KhachHang($ma,$ten,$ngay,$tong){
        $this->makh=$ma;
        $this->tenkh=$ten;
        $this->ngaydangky=$ngay;
        $this->tongkhachhang=$tong;
    }
}