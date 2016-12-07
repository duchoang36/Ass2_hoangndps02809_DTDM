<?php include 'session.php';?>
<?php include 'database.php';?>
<?php
if(isset($_POST['searchkh'])){
	$makh = $_POST['makh'];
  $query = "SELECT * from khachhang where makh LIKE '$makh'";
  $result = mysqli_query($connect,$query);
  echo "<table>";
  // Chèn XTemplate vào d? án d? án d?i
  require_once 'xtemplate.class.php';
  // Kh?i t?o class
  $xtpl = new XTemplate( 'tmpkhachhang.html', '' );
  while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    $fieldkh = array();
    $fieldkh["makh"] = $row["makh"];
    $fieldkh["tenkh"] = $row["tenkh"];
    $fieldkh["tendn"] = $row["tendn"];
    $fieldkh["diachi"] = $row["diachi"];
    $fieldkh["gioitinh"] = $row["gioitinh"];
    $fieldkh["hinhanh"] = $row["hinhanh"];
    $fieldkh["sdt"] = $row["sdt"];
      $fieldkh["email"] = $row["email"];
      $fieldkh["ngaydangky"] = $row["ngaydangky"];
      $fieldkh["trangthaionline"] = $row["trangthaionline"];
  $xtpl->assign( 'DATA', $fieldkh);
  $xtpl->parse( 'main.loop' );
  	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
  }

  $xtpl->parse( 'main' );
  // In n?i dung khôi main ra màn hình
  echo $xtpl->text('main' );
  mysqli_close($connect); //Make sure to close out the database connection
}
?>
