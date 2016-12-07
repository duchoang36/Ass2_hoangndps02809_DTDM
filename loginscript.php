<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['btnLogin'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
//$password=$_POST['password'];
$password=md5($_POST['password']);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("cornerco_t3hdbnew", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from quantri where matkhau='$password' AND tendn ='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username;
//insert in database quanlylogin
mysql_query("INSERT into quanlylogin(malogin,tenqllg) VALUES (null,'$username')",$connection);
header("location: index.php");
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>
