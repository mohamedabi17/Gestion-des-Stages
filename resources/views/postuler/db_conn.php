<?php  

$sname = "127.0.0.1";
$uname = "root";
$password = "";

$db_name = "gestion_des_stages";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}
