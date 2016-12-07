<?php include 'database.php' ?>
<?php
$query = "SELECT * FROM khachhang ORDER BY makh DESC"; //You don't need a ; like you do in SQL
$result = mysqli_query($connect,$query);
echo "<table border='1'>";
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
	 if($row["gioitinh"] =='0'){
	        $fieldkh["gioitinh"] = 'Nam';
	 }else if($row["gioitinh"] == '1')
	 {
	 	$fieldkh["gioitinh"] = 'Nữ';
	 }else{
	 	$fieldkh["gioitinh"] = 'Chưa XĐ';
	 }
	// $fieldkh["gioitinh"] = $row["gioitinh"];
	 $fieldkh["sdt"] = $row["sdt"];
     $fieldkh["email"] = $row["email"];
		 $fieldkh["hinhanh"] =$row["hinhanh"];
     $fieldkh["ngaydangky"] = $row["ngaydangky"];
		 $fieldkh["trangthaikh"] = $row["trangthaikh"];
     $fieldkh["trangthaionline"] = $row["trangthaionline"];
$xtpl->assign( 'DATA', $fieldkh );
$xtpl->parse( 'main.loop' );
	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
}
$xtpl->parse( 'main' );
// In n?i dung khôi main ra màn hình
echo $xtpl->text('main' );
mysqli_close($connect); //Make sure to close out the database connection
?>
