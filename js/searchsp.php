<?php include 'database.php';?>
<?php
$result = "SELECT * from sanpham";
  $abc = mysqli_query($connect,$result);
  if(isset($_POST['search'])){ // Người dùng đã ấn submit
  			$masp = $_POST['masp'];
          $result = "SELECT * from sanpham where masp LIKE '$masp'";
            $abc = mysqli_query($connect,$result);
        //uploadfile
        $thongtinsp = $row['thongtinsp'];
          echo $thongtinsp;
        }else {
          # code...        while($row = mysqli_fetch_array($abc)){
                      $tensp = $row['tensp'];
                      echo $tensp;
        }
  }
?>
