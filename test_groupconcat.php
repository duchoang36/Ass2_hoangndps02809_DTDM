<?php include 'database.php' ?>
<?php
$query  = "SELECT *,GROUP_CONCAT(gia),GROUP_CONCAT(tensp) FROM chitietdonhang,sanpham
    where madh = '256' && sanpham.masp = chitietdonhang.masp ";
$result = mysqli_query($connect,$query);
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	 $gia = $row["GROUP_CONCAT(gia)"];
   $tensp = $row["GROUP_CONCAT(tensp)"];
   echo $gia;
   echo $tensp;
}
?>
