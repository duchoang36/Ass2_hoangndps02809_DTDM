<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
// Selecting Database
$db = mysql_select_db("cornerco_t3hdbnew", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select tendn from quantri where tendn='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['tendn'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>
