<!DOCTYPE html>
<html>
<body>
<?php
$con = mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("cornerco_testadmin", $con);
 
$sql="INSERT INTO khachhang
VALUES
('$_POST[makh]','$_POST[tenkh]','$_POST[tendn]','$_POST[matkhau]','$_POST[diachi]','$_POST[gioitinh]','$_POST[sdt]','$_POST[email]','$_POST[ngaydangky]')";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<script>window.location = 'showkh.html'</script>";
 
mysql_close($con)
?>

    </body>
</html>