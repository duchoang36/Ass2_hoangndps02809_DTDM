<?php include 'database.php';?>
<?php
    $result = mysqli_query($connect,"Select * from donhang INNER JOIN chitietdonhang ON donhang.madh = chitietdonhang.madh");
    while($row = mysqli_fetch_array($result)){
      $abc = $row['gia'];
      echo $abc;
    }
?>
