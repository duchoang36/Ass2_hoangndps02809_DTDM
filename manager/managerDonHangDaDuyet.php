<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$ngaybatdau = $_REQUEST["ngaybatdau"];
$ngayketthuc = $_REQUEST["ngayketthuc"];

$donhang = mysql_query("SELECT * FROM donhang where (trangthaidh like 'daduyet') AND (ngaylapdh BETWEEN CAST('$ngaybatdau' AS DATE) 
AND CAST('$ngayketthuc' AS DATE))") or die(mysql_error());

$mang=array();
while ($row=  mysql_fetch_array($donhang)){
    $madh=$row["madh"];
    $tongtien=$row["tongtien"];
    $ngaylapdh=$row["ngaylapdh"];
    array_push($mang,new DonHang($madh,$tongtien,$ngaylapdh));
}

echo json_encode($mang);
class DonHang{
    var $madh;
    var $tongtien;
    var $ngaylapdh;
    function DonHang($ma,$tong,$ngay){
        $this->madh=$ma;
        $this->tongtien=$tong;
        $this->ngaylapdh=$ngay;
    }
}