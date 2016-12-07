<?php
$con = mysql_connect("host1.vietnix.vn", "cornerco", "cornerco");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("cornerco_testadmin", $con);
 
$sql="INSERT INTO nametable
VALUES
('$_POST[fname]','$_POST[lname]')";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
 
mysql_close($con)
?>