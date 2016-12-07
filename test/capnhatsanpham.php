<?php
include('session.php');
?>
<?php include 'database.php' ?>
<?php
	if(isset($_GET['masp'])&& is_numeric($_GET['masp'])){
		//nhan masp tu get
		$masp = $_GET['masp'];
		$result = mysqli_query($connect,"SELECT * from sanpham WHERE masp = '$masp'");
		while($row = mysqli_fetch_array($result)){
			$masp = $row['masp'];
			$tensp = $row['tensp'];
			$giasp = $row['giasp'];
			$thongtinsp = $row['thongtinsp'];
			$hinhanh = $row['hinhanh'];
			$soluong = $row['soluong'];
			$matheloai = $row['matheloai'];
			$maqt = $row['maqt'];
      $trangthaisp = $row['trangthaisp'];
		}
		include 'updatesp.php' ;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
          <?php include 'slidebar.php' ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
              <div style="width:100%" class="navbar navbar-default">

                 <nav class="navbar-static-top">
                        <button type="button" style="float:left;margin-top:20px;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="menu-toggle">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                  </nav>
                  <h1 style="text-align:center">CẬP NHẬT SẢN PHẨM</h1>
             </div>
        <div id="page-content-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
            <table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
						<tr>
								<tbody>
									<td style="width:50%;"></td>
									<td><img src="<?php echo $hinhanh;?>" style="width:100px;height=100px"/></td>
								</tbody>

						</tr>
						</table>
						<form  action="" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tbody>
	   <tr>
			<td style="width:25%;">
		</td>
    	<td>
   		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
			<tbody>
			<tr>
				<td height="10px"></td>
			</tr>

				<tr>
					<td width="23%"   align="right">Tên sản phẩm</td>
					<td width="1%"   align="center"><font color="#FF0000">*</font></td>
					<td width="70%"  >
						<input value="<?php echo $tensp;?>" type="text"  name="tensp"  class="form-control" size="34" required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">giá sp</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
						<input value="<?php echo $giasp;?>" type="text" name="giasp" class="form-control" size="34" required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">Số lượng</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
						<input value="<?php echo $soluong;?>" type="text" name="soluong" class="form-control" size="34" required></td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">Hình sản phẩm</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
						<input type="file" name="file" id="file" value="" class="form-control" size="34" ><?php echo $hinhanh;?></input>
						</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">Thông tin sản phẩm</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
						<textarea name="thongtinsp" value="" cols="80" rows="10" ><?php echo $thongtinsp;?></textarea></td>
				</tr>
        <tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">Không hiển thị</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
						<input type="checkbox" name="trangthaisp" value="on" cols="80" rows="10" <?php echo $trangthaisp>0?'checked':''?>></td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">Thuộc thể loại</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
            <select name="matheloai">
              <option value="1" <?php echo $matheloai==1? 'selected':''?>>Iphone</option>
              <option value="2" <?php echo $matheloai==2? 'selected':''?>>Ipad</option>
              <option value="3" <?php echo $matheloai==3? 'selected':''?>>IMac</option>
              <option value="4" <?php echo $matheloai==4? 'selected':''?>>Macbook</option>
              <option value="5" <?php echo $matheloai==5? 'selected':''?>>Apple Watch</option>
              <option value="6" <?php echo $matheloai==6? 'selected':''?>>Apple TV</option>
              <option value="7" <?php echo $matheloai==7? 'selected':''?>>Apple Accessories </option>
            </select>
					</td>
				</tr>	<tr><td height="10px"></td></tr>
        <tr>
					<td width="23%"   align="right">Mã quản trị</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
            <select name="maqt">
              <option value="1" <?php echo $matheloai==1? 'selected':''?>>Thiet</option>
              <option value="2" <?php echo $matheloai==2? 'selected':''?>>Hoa</option>
              <option value="3" <?php echo $matheloai==3? 'selected':''?>>Hoang</option>
              <option value="4" <?php echo $matheloai==4? 'selected':''?>>Hao</option>
            </select>
					</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="20%"  ></td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
					<input type="submit" value="Upload" name="ok" class="btn btn-primary">
				    <input type="reset" class="btn btn-primary" value="Nhập lại">
					</td>
				</tr>
		  </tbody>
		  </table>
		</td>
		<td style="width:25%;">
		</td>
	</tr>
</tbody>
</table>
</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
