<?php include 'database.php'; include 'session.php' ?>
<?php
// connect to the database
// check if the 'masp' variable is set in URL, and check that it is valmasp
if (isset($_GET['masp']) && is_numeric($_GET['masp']))
{
// get masp value
$masp = $_GET['masp'];
// delete the entry
$result = mysqli_query($connect,"DELETE FROM sanpham WHERE masp=$masp")
or die(mysql_error());
// redirect back to the view page
header("Location: index.php");
}
else
// if masp isn't set, or isn't valmasp, redirect back to view page
{
header("Location: index.php");
}
?>
