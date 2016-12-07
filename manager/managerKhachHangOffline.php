<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");

$khachhang = mysql_query("SELECT * FROM khachhang where trangthaionline like '0'") or die(mysql_error());

$mang=array();
while ($row=  mysql_fetch_array($khachhang)){
    $makh=$row["makh"];
    $tenkh=$row["tenkh"];
    $ngaydangky=$row["ngaydangky"];
    array_push($mang,new KhachHang($makh,$tenkh,$ngaydangky));
}

echo json_encode($mang);
class KhachHang{
    var $makh;
    var $tenkh;
    var $ngaydangky;
    function KhachHang($ma,$ten,$ngay){
        $this->makh=$ma;
        $this->tenkh=$ten;
        $this->ngaydangky=$ngay;
    }
}