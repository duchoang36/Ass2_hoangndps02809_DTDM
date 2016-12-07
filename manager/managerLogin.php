<?php
mysql_connect("host1.vietnix.vn", "cornerco", "7q7tkMZj06");
mysql_select_db("cornerco_t3hdbnew");
mysql_query("SET NAMES 'utf8'");
header('Content-Type: text/html; charset=utf-8');
$user = $_POST["user_name"];
$pass = $_POST["password"];

$quanly = mysql_query("SELECT * FROM quanly where tendn like '$user' AND matkhau like '$pass'") or die(mysql_error());
if(mysql_num_rows($quanly)>0){
    echo "Login Success";
}  else {
echo "Wrong password ! ";
}
?>