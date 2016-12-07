<?php include 'database.php'; include 'session.php'?>
<?php
// connect to the database
// check if the 'makh' variable is set in URL, and check that it is valmakh
if (isset($_GET['makh']) && is_numeric($_GET['makh']))
{
// get makh value
$makh = $_GET['makh'];
// delete the entry
$result = mysqli_query($connect,"DELETE FROM sanpham WHERE makh=$makh")
or die(mysql_error());
// redirect back to the view page
header("Location: danhsachkhachhang.php");
}
else
// if makh isn't set, or isn't valmakh, redirect back to view page
{
header("Location: danhsachkhachhang.php");
}
?>
