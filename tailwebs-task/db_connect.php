<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tailwebs_task';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(mysqli_connect_error()) {
	echo 'Connection Error!';die;
}

?>