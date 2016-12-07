<?php
include 'database.php';
?>
<?php
include('session.php');
?>
<?php
	if(isset($_GET['masp'])&& is_numeric($_GET['masp'])){
		$masp = $_GET['masp'];
		$result = mysqli_query($connect,"SELECT * from sanpham WHERE masp = '$masp'");
		$row = mysqli_fetch_array($result);
			$thongtinsp = $row['thongtinsp'];
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
    <!-- Custom CSS -->
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
                  <h1 style="text-align:center">DANH SÁCH SẢN PHẨM</h1>
             </div>
        <div id="page-content-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
											<table>
												<tr>
													<th><a href="themsanpham.php"><image src="image/add.png" style="width:50px;height:50px" /></a></th>
												</tr>
											</table>
                      	<dialog  id="myDialog"><?php  echo $thongtinsp; ?><button onclick="closeDialog()">Close dialog</button></dialog>
        								<?php include 'showdatabase.php';?>
				                </div>
                </div>
            </div>

        </div>

        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script>
		var x = document.getElementById("myDialog");
		function showDialog() {
			x.show();
		}

		function closeDialog() {
			x.close();
		}
		</script>

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
