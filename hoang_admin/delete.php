<?php include 'database.php' ?>
<?php
// connect to the database
// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get id value
$id = $_GET['id'];
// delete the entry
$result = mysqli_query($connect,"DELETE FROM sanpham WHERE id=$id")
or die(mysql_error());
// redirect back to the view page
header("Location: h_display.php");
}
else
// if id isn't set, or isn't valid, redirect back to view page
{
header("Location: h_display.php");
}
?>
