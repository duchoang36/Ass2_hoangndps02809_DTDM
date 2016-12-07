<?php include 'database.php'; include 'session.php' ?>
<?php
	if(isset($_GET['makh'])&& is_numeric($_GET['makh'])){
		//nhan makh tu get
		$makh = $_GET['makh'];
		$result = mysqli_query($connect,"SELECT * from khachhang WHERE makh = '$makh'");
		while($row = mysqli_fetch_array($result)){
			$makh = $row['makh'];
			$tenkh = $row['tenkh'];
			$tendn = $row['tendn'];
			$diachi = $row['diachi'];
			$gioitinh = $row['gioitinh'];
			$sdt = $row['sdt'];
			$email = $row['email'];
      $ngaydangky = $row['ngaydangky'];
			$trangthaionline = $row['trangthaionline'];
			$trangthaikh = $row['trangthaikh'];
		}
		include 'updatekh.php' ;
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
          <?php include 'slidebar.php';?>
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
                  <h1 style="text-align:center">CẬP NHẬT KHÁCH HÀNG</h1>
             </div>
        <div id="page-content-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
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
					<td width="15%"   align="right">Tên KH</td>
					<td width="1%"   align="center"><font color="#FF0000">*</font></td>
					<td width="83%"  >
						<input value="<?php echo $tenkh;?>" type="text"  name="tenkh"  class="form-control" size="34" required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Tên DN</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="<?php echo $tendn;?>" type="text" name="tendn" class="form-control" size="34" required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">diachi</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="<?php echo $diachi;?>" type="text" name="diachi" class="form-control" size="34" required></td>
				</tr>
				<tr><td height="10px"></td  ></tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Giới tính</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="<?php echo $gioitinh;?>" type="text" name="gioitinh" class="form-control" size="34" required>
            </td>
						</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">SDT</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="<?php echo $sdt;?>" type="text" name="sdt" class="form-control" size="34" required></td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">email</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
           	<input value="<?php echo $email;?>" type="text" name="email" class="form-control" size="34" required></td>
					</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="23%"   align="right">Band tài khoản</td>
					<td width="1%"   align="center"></td>
					<td width="70%"  >
					<input type="checkbox" name="trangthaikh" value="on" cols="80" rows="10" <?php echo $trangthaikh<1?'checked':''?>></td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="20%"  ></td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
					<input type="submit" value="UpDate" name="okKH" class="btn btn-primary">
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
