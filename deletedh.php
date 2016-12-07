<?php include 'database.php'; include 'session.php' ?>
<?php
// connect to the database
// check if the 'masp' variable is set in URL, and check that it is valmasp
if (isset($_GET['madh']) && is_numeric($_GET['madh']))
{
// get masp value
$madh = $_GET['madh'];
// delete the entry
$result = mysqli_query($connect,"DELETE FROM chitietdonhang WHERE madh=$madh")
or die(mysql_error());
// redirect back to the view page
header("Location: donhang.php");
$result = mysqli_query($connect,"DELETE FROM donhang WHERE madh=$madh")
or die(mysql_error());
// redirect back to the view page
header("Location: donhang.php");
}
else
// if masp isn't set, or isn't valmasp, redirect back to view page
{
header("Location: donhang.php");
}
?>
