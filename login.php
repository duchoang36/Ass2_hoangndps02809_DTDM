<?php
include('loginscript.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: index.php");
}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login form</title>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <form method="post" action="">
<div class="form">
  <div class="forceColor"></div>
  <div class="topbar">
    <div class="spanColor"></div>
	 <input type="text" class="input" id="username" name="username" placeholder="username"/>
    <input type="password" class="input" id="password"  name="password" placeholder="Password"/>
  </div>
  <input type="submit" class="submit" name="btnLogin" id="submit" value="Login">
</div>
</form>
  </body>
</html>
