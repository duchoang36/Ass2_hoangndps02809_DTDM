<?php include 'session.php';?>
<?php include 'database.php';?>
<?php
if(isset($_POST['search'])){
	$masp = $_POST['masp'];
  $query = "SELECT * from sanpham,theloai,quantri where masp LIKE '$masp' && sanpham.matheloai = theloai.matheloai && sanpham.maqt = quantri.maqt";
  $result = mysqli_query($connect,$query);
  echo "<table>";
  // Chèn XTemplate vào d? án d? án d?i
  require_once 'xtemplate.class.php';
  // Kh?i t?o class
  $xtpl = new XTemplate( 'tmpindex.html', '' );
  while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
  		$limitthongtin = substr($row["thongtinsp"],0,100);
  	  $fiedsp = array();
  	  $fiedsp["masp"] = $row["masp"];
  	  $fiedsp["tensp"] = $row["tensp"];
  	  $fiedsp["giasp"] = $row["giasp"];
  	//	$fiedsp["thongtinchitiet"] = $row["thongtinsp"];
  		$fiedsp["thongtinsp"] = $limitthongtin;
  	//$fiedsp["thongtinsp"] = $row["thongtinsp"];
  	  $fiedsp["hinhanh"] = $row["hinhanh"];
  	  $fiedsp["trangthaisp"] = $row["trangthaisp"];
      $fiedsp["soluong"] = $row["soluong"];
      $fiedsp["tentheloai"] = $row["tentheloai"];
      $fiedsp["tenqt"] = $row["tenqt"];
      $fiedsp["ngaythem"] = $row["ngaythem"];
  $xtpl->assign( 'DATA', $fiedsp );
  $xtpl->parse( 'main.loop' );
  $xtpl->parse( 'main.form' );
  	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
  }

  $xtpl->parse( 'main' );
  // In n?i dung khôi main ra màn hình
  echo $xtpl->text('main' );
  mysqli_close($connect); //Make sure to close out the database connection
}
?>