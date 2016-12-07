<?php
$connect= mysqli_connect('host1.vietnix.vn','cornerco','7q7tkMZj06','cornerco_t3hdbnew');
if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}
 @mysqli_set_charset($connect,"utf8");
?>