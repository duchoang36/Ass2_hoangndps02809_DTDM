<?php include 'session.php';?>
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
                  <h1 style="text-align:center">THÊM SẢN PHẨM</h1>
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
					<td width="15%"   align="right">Tên sản phẩm</td>
					<td width="1%"   align="center"><font color="#FF0000">*</font></td>
					<td width="83%"  >
						<input value="" type="text"  name="tensp"  class="form-control" size="34" required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">giá sp</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="" type="text" name="giasp" class="form-control" size="34" required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>

				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Hình sản phẩm</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input type="file" name="file" id="file" class="form-control" size="34" required	>
						</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Thông tin sản phẩm</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<textarea name="thongtinsp" cols="80" rows="10" ></textarea></td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Thuộc thể loại</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
            <select name="matheloai">
              <option value="1">Iphone</option>
              <option value="2">Ipad</option>
              <option value="3">IMac</option>
              <option value="4">Macbook</option>
              <option value="5">Apple Watch</option>
              <option value="6">Apple TV</option>
              <option value="7">Apple Accessories </option>
            </select>
					</td>
				</tr>	<tr><td height="10px"></td></tr>
        <tr>
					<td width="15%"   align="right">Ma qt</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
            <select name="maqt">
              <option value="1">Thiet</option>
              <option value="2">Hoa</option>
              <option value="3">Hoang</option>
              <option value="4">Hao</option>
            </select>
					</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="20%"  ></td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
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
<?php include 'upload.php'; ?>

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
