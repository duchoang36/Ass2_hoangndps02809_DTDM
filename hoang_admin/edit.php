<?php include 'database.php' ?>;
<?php 
$result = mysqli_query($connect,"SELECT * FROM sanpham");
while($row = mysqli_fetch_array($result)){
$id = $row['id'];
$tensanpham = $row['tensanpham'];
$gia = $row['gia'];

echo $id;
echo "<br/>";
echo "<input name='abcd' value='".$tensanpham."'/>";
echo "<br/>";
echo $gia;
}
mysqli_close($connect);
?>

