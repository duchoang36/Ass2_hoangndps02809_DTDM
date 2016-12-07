<?php include 'database.php'; ?>
<?php
// create a variable
$tensanpham=$_POST['tensanpham'];
$gia=$_POST['gia'];
$hinhanh=$_POST['hinhanh'];
//Execute the query
mysqli_query($connect,"INSERT INTO sanpham (tensanpham,gia,hinhanh)
		        VALUES ('$tensanpham','$gia','$hinhanh')");
				
	if(mysqli_affected_rows($connect) > 0){
    echo print_r($_POST);
	//echo "<a href="index.html">Go Back</a>",
} else {
	echo "Employee NOT Added<br />";
	echo mysqli_error ($connect);
}
