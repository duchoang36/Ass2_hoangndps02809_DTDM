<?php include 'database.php' ?>
<?php
$query  = "SELECT * FROM donhang
          INNER JOIN khachhang ON khachhang.makh = donhang.makh Where donhang.trangthaidh = 'daduyet'  ORDER BY donhang.madh DESC";//You don't need a ; like you do in SQL
  //  INNER JOIN sanpham ON sanpham.masp = chitietdonhang.masp
  //  INNER JOIN donhang ON donhang.madh = chitietdonhang.madh
$result = mysqli_query($connect,$query);
echo "<table border='1'>";
// Chèn XTemplate vào d? án d? án d?i
require_once 'xtemplate.class.php';
// Kh?i t?o class
$xtpl = new XTemplate( 'tmpdonhangdd.html', '' );
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	 $fieldh = array();
   //donhang
	 $fieldh["madh"] = $row["madh"];
	 $fieldh["ngaylapdh"] = $row["ngaylapdh"];
	 $fieldh["tongtien"] = number_format($row["tongtien"]);
	 $fieldh["ghichu"] = $row["ghichu"];
	 $fieldh["trangthaidh"] = $row["trangthaidh"];
   //khachhang
   $fieldh["makh"] = $row["makh"];
   $fieldh["tenkh"] = $row["tenkh"];
   $fieldh["sdt"] = $row["sdt"];
   //chitietdonhang
   //$fieldh["machitietdh"] = $row["machitietdh"];
  //$fieldh["soluong"] = $row["soluong"];
  //$fieldh["gia"] = $row["gia"];
 //sanpham
 //$fieldh["masp"] = $row["masp"];
 //$fieldh["tensp"] = $row["tensp"];
$xtpl->assign( 'DATA', $fieldh );
$xtpl->parse( 'main.loop' );
	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
}
$xtpl->parse( 'main' );
// In n?i dung khôi main ra màn hình
echo $xtpl->text('main' );
mysqli_close($connect); //Make sure to close out the database connection
?>
