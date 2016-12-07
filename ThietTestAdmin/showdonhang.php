<?php include 'database.php' ?>
<?php
$query = "SELECT * FROM donhang
         	INNER JOIN chitietdonhang ON donhang.madh = chitietdonhang.madh
          INNER JOIN khachhang ON donhang.makh = khachhang.makh
          INNER JOIN sanpham ON chitietdonhang.masp = sanpham.masp" ORDER BY madh ASC; //You don't need a ; like you do in SQL
$result = mysqli_query($connect,$query);
echo "<table border='1'>";
// Chèn XTemplate vào d? án d? án d?i
require_once 'xtemplate.class.php';
// Kh?i t?o class
$xtpl = new XTemplate( 'tmpdonhang.html', '' );
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	 $fieldh = array();
   //donhang
	 $fieldh["madh"] = $row["madh"];
	 $fieldh["ngaylapdh"] = $row["ngaylapdh"];
	 $fieldh["tongtien"] = $row["tongtien"];
	 $fieldh["ghichu"] = $row["ghichu"];
	 $fieldh["trangthaidh"] = $row["trangthaidh"];
   //chitietdonhang
   $fieldh["machitietdh"] = $row["machitietdh"];
  $fieldh["soluong"] = $row["soluong"];
  $fieldh["gia"] = $row["gia"];
  //khachhang
  $fieldh["makh"] = $row["makh"];
 $fieldh["tenkh"] = $row["tenkh"];
 $fieldh["sdt"] = $row["sdt"];
 //sanpham
 $fieldh["masp"] = $row["masp"];
$fieldh["tensp"] = $row["tensp"];
$xtpl->assign( 'DATA', $fieldh );
$xtpl->parse( 'main.loop' );
	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
}
$xtpl->parse( 'main' );
// In n?i dung khôi main ra màn hình
echo $xtpl->text('main' );
mysqli_close($connect); //Make sure to close out the database connection
?>
