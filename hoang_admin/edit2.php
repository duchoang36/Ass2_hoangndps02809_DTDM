<?php include 'database.php' ?>;
<?php 
	$query = mysqli_query($connect,"UPDATE sanpham SET id='$id', tensanpham='$tensanpham' WHERE id='$id");
	if (isset($_GET['id']) && is_numeric($_GET['id']))
{		
	$id = $_GET['id'];
	$result = mysqli_query($connect,"SELECT * FROM sanpham WHERE id='$id'");
	while($row = mysqli_fetch_array($result)){
			echo $id;
		 $id = $row['id'];
		 $tensanpham = $row['tensanpham'];
	}
}
?>
<?php include 'upload.php' ?>
<html>
<head>
<title>Edit Record</title>
</head>
<body>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div>
<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>First Name: *</strong> <input type="text" name="id" value="<?php echo $id; ?>"/><br/>
<strong>Last Name: *</strong> <input type="text" name="tensanpham" value="<?php echo $tensanpham; ?>"/><br/>
<p>* Required</p>
<input type="submit" name="ok" value="Upload">
</div>
</form>
</body>
</html>
