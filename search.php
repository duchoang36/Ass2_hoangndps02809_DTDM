<?php
include 'database.php';
?>
<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
                  <h1 style="text-align:center">Tìm Kiếm</h1>
             </div>
        <div id="page-content-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      	<dialog  id="myDialog"><?php  echo $thongtinsp; ?><button onclick="closeDialog()">Close dialog</button></dialog>
												<form  action="" method="post" enctype="multipart/form-data">
													<table>
														<tr>
															<th><input type="text" class="form-control" placeholder="tim theo mã sp" name="masp"/></th>
															<th><input type="submit" class="btn btn-primary" value="SEARCH" name="search"/></a></th>

                              <th><input type="text" class="form-control" placeholder="tim theo mã kh" name="makh"/></th>
                              <th><input type="submit" class="btn btn-primary" value="SEARCH" name="searchkh"/></a></th>
                              
                              <th><input type="text" class="form-control" placeholder="tim theo mã đơn hàng" name="madh"/></th>
                              <th><input type="submit" class="btn btn-primary" value="SEARCH" name="searchdh"/></a></th>
														</tr>
													</table>
												</form>
                          <?php require_once 'timkiemdh.php' ;?>
                          <?php require_once 'timkiemkh.php' ;?>
                          <?php require_once 'timkiemsp.php' ;?>
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
