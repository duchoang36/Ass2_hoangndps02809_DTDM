<!DOCTYPE html>
<html>
<head>
<style>
label{display:inline-block;width:100px;margin-bottom:10px;}
</style>
<title>Add Employee</title>
</head>
<body>
</form>
<form  action="" method="post" enctype="multipart/form-data">
  <label>ten</label>
  <input type="text" name="tensanpham" />
  <br />
  <label>gia</label>
  <input type="text" name="gia" />
  <br />
  <label>theloai</label>
  <select name="theloai">
    <option value="1">dasdasd</option>
    <option value="2">312312</option>
    <option value="3">4234234</option>
    <option value="4">23423423</option>
  </select>
  
    Select image to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload" name="ok">
</form>
<?php include 'upload.php'; ?>
</body>
</html>
