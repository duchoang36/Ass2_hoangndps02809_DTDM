<?php include 'database.php'; ?>
<?php 
 $query = "SELECT * FROM sanpham"; //You don't need a ; like you do in SQL
$result = mysqli_query($connect,$query);
 $row = mysql_fetch_array($result);
 echo $row['thongtinsp'];
?>