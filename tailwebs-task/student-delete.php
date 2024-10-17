<?php
include('db_connect.php');

if(!isset($_GET['id'])){
	echo 'id parameter is not passed';die;
} else if($_GET['id'] == ''){
	echo 'Please fill the id';die;
}

$id = htmlspecialchars($_GET['id']);

$query = "DELETE FROM students WHERE id = '$id'";

if(mysqli_query($conn,$query)){
	echo 1;
} else {
	echo 0;
}
?>