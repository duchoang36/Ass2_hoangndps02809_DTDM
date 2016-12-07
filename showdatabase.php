<?php include 'database.php' ?>
<?php
if(isset($_GET['masp'])&& is_numeric($_GET['masp'])){
	$masp = $_GET['masp'];
}
if(isset($_POST['ok'])){ // Người dùng đã ấn submit
			$trangthaisp = $_POST['abcd'];
			//$number = $_POST['off'];

			//echo $trangthaisp;
			mysqli_query($connect,"UPDATE sanpham  SET trangthaisp = '$trangthaisp' WHERE masp = '$masp'");
					echo '<script type="text/javascript">alert("UPDATE success");</script>';
    }
?>
<?php
$query = "SELECT * FROM sanpham
					INNER JOIN theloai ON sanpham.matheloai = theloai.matheloai
					INNER JOIN quantri ON sanpham.maqt = quantri.maqt ORDER BY masp DESC"; //You don't need a ; like you do in SQL
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
    //$fiedsp["soluong"] = $row["soluong"];
    $fiedsp["tentheloai"] = $row["tentheloai"];
    $fiedsp["tenqt"] = $row["tenqt"];
    $fiedsp["ngaythem"] = $row["ngaythem"];
$xtpl->assign( 'DATA', $fiedsp );
$xtpl->parse( 'main.loop' );

	// S? d?ng parse, khai báo kh?i ch?a n?i dung này
}

$xtpl->parse( 'main' );
// In n?i dung khôi main ra màn hình
echo $xtpl->text('main' );
mysqli_close($connect); //Make sure to close out the database connection
?>
