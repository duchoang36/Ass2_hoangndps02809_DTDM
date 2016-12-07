<?php include 'session.php';?>
<?php include 'database.php';?>
<?php
if(isset($_POST['searchdh'])){
	$madh = $_POST['madh'];
	$query  = "SELECT * FROM donhang
			INNER JOIN khachhang ON khachhang.makh = donhang.makh where donhang.madh = '$madh' ";
/*$query  = "SELECT *,GROUP_CONCAT(gia),GROUP_CONCAT(tensp),GROUP_CONCAT(soluong)FROM chitietdonhang
		INNER JOIN sanpham ON sanpham.masp = chitietdonhang.masp
		INNER JOIN donhang ON donhang.madh = chitietdonhang.madh
		INNER JOIN khachhang ON khachhang.makh = donhang.makh where chitietdonhang.madh = '$madh' ";
	*/
  $result = mysqli_query($connect,$query);
//  echo "<table>";
  // Chèn XTemplate vào d? án d? án d?i
  require_once 'xtemplate.class.php';
  // Kh?i t?o class
  $xtpl = new XTemplate( 'tmpdonhang.html', '' );
  while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
 //donhang
	 $fieldh["madh"] = $row["madh"];
	 $fieldh["ngaylapdh"] = $row["ngaylapdh"];
	 $fieldh["tongtien"] = number_format($row["tongtien"]);
	 $fieldh["ghichu"] = $row["ghichu"];
	 $fieldh["trangthaidh"] = $row["trangthaidh"];
   //chitietdonhang
   $fieldh["machitietdh"] = $row["machitietdh"];
	   $fieldh["soluong"] = $row["soluong"];
//  $fieldh["soluong"] = $row["GROUP_CONCAT(soluong)"];
  $fieldh["gia"] = number_format($row["gia"]);
  //khachhang
  $fieldh["makh"] = $row["makh"];
 $fieldh["tenkh"] = $row["tenkh"];
 $fieldh["sdt"] = $row["sdt"];
 //sanpham
 $fieldh["masp"] = $row["masp"];
$fieldh["tensp"] = $row["tensp"];
  $xtpl->assign( 'DATA', $fieldh);
  $xtpl->parse( 'main.loop' );
  	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
  }

  $xtpl->parse( 'main' );
  // In n?i dung khôi main ra màn hình
  echo $xtpl->text('main' );
  mysqli_close($connect); //Make sure to close out the database connection
}
?>
