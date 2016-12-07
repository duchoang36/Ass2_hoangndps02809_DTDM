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
     <script language='javascript'>
 function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode

 if (charCode > 31 && (charCode < 48 || charCode > 57)){
  alert("Vui lòng nhập số");
 return false;
 }else{
   return true;
 }
 }
 </script>
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
                  <h1 style="text-align:center">THÊM THÀNH VIÊN</h1>
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
					<td width="15%"   align="right">Tên thành viên</td>
					<td width="1%"   align="center"><font color="#FF0000">*</font></td>
					<td width="83%"  >
						<input value="" type="text"  name="tenqt"    required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Tên Đăng Nhập</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="" type="text" name="tendn"   required>	</td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">mật khẩu</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input value="" type="password" name="matkhau"  cols="80" rows="10" required></td>
				</tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Địa chỉ</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
						<input name="diachi" cols="80" rows="10" required></input></td>
				</tr>
        <tr><td height="10px"></td></tr>
        <tr>
          <td width="15%"   align="right">Email</td>
          <td width="1%"   align="center"></td>
          <td width="83%"  >
            <input name="email" cols="80" rows="10" type="email" required ></input></td>
        </tr>
				<tr><td height="10px"></td></tr>
        <tr>
          <td width="15%"   align="right">SDT</td>
          <td width="1%"   align="center"></td>
          <td width="83%"  >
            <input type="text" cols="80" name="sdt" rows="10"  onKeyPress="return isNumberKey(event)" required></input></td>
        </tr>
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%"   align="right">Giới tính</td>
					<td width="1%"   align="center"></td>
					<td width="83%"  >
            <input type="radio" name="gioitinh" value="2" checked> Chưa xác định
            <input type="radio" name="gioitinh" value="0"> Nam
            <input type="radio" name="gioitinh" value="1"> Nữ
					</td>
				</tr>	<tr><td height="10px"></td></tr>
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
<?php include 'uploadtv.php'; ?>

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
