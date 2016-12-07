<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
$madonhang = $_REQUEST["madonhang"];

$donhang = mysql_query("UPDATE donhang SET tongtien = ("
        . "SELECT chitietdonhang.soluong* sanpham.giasp "
        . "FROM  `sanpham` ,  `chitietdonhang`  "
        . "WHERE sanpham.masp = chitietdonhang.masp AND madh LIKE '202' ) "
        . "WHERE madh like '202'") or die(mysql_error());

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
    function DonHang($ma,$tong,$ngaylapdh){
        $this->madh=$ma;
        $this->tongtien=$tong;
        $this->ngaylapdh=$ngay;
    }
}