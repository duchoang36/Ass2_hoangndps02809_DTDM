<?php
// include db connect class
require_once('db_connect.php');
// connecting to db
$db = new DB_CONNECT();
//$link = mysqli_connect("mysql.hostinger.vn","u103890327_adroi","0938148197","u103890327_data");
//mysqli_query($link,"SET NAMES 'utf8'");
$khoahoc = mysql_query("SELECT sanpham.masanpham,sanpham.tensanpham ,ROUND(sanpham.giasanpham*sanpham.khuyenmai,-1) as giakhuyenmai,
sanpham.giasanpham, sanpham.hinhanhsanpham, sanpham.ngaytaosanpham,
 sanpham.khuyenmai,sanpham.maloaisanpham  , theloai.tenloaisanpham, admin.maadmin ,admin.tenadmin
FROM sanpham, theloai, admin 
where sanpham.maloaisanpham = theloai.maloaisanpham and sanpham.maadmin = admin.maadmin");
$mang["sanpham"] = array();
while($row = mysql_fetch_array($khoahoc)){
	 $tungsanpham = array();
	$tungsanpham["id"] = $row["masanpham"];
	$tungsanpham["name"] = $row["tensanpham"];
	$tungsanpham["price"] = $row["giasanpham"];
	$tungsanpham["images"]  = $row["hinhanhsanpham"]; 
	array_push($mang["sanpham"],$tungsanpham);
}
echo json_encode($mang);
class Product{
	var $id;
	var $name;
	var $price;
	var $images;
	function Product($i,$n,$p,$m){
		$this -> id = $i;
		$this -> name = $n;
		$this -> price = $p;
		$this -> images = $m;
	}
}
?>