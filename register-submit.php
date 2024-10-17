<?php
include('db_connect.php');

if(!isset($_POST['name'])){
    echo 'Name parameter not passed'; die;
} else if($_POST['name'] == ''){
    echo 'Please fill your Name'; die;
}

$name = htmlspecialchars($_POST['name']);

if(!isset($_POST['email'])){
    echo 'Email parameter not passed'; die;
} else if($_POST['email'] == ''){
    echo 'Please fill your Email'; die;
}

$email = htmlspecialchars($_POST['email']);

if(!isset($_POST['password'])){
    echo 'Password parameter not passed'; die;
} else if($_POST['password'] == ''){
    echo 'Please fill your Password'; die;
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$created_at = date('Y-m-d h:i:s');

// Prepare an SQL statement
$query = "INSERT INTO admin(`name`, `email`, `password`, `created_at`) VALUES (?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conn, $query)) {
    // Bind parameters to the query
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $created_at);
    
    if (mysqli_stmt_execute($stmt)) {
        echo 1;
    } else {
        echo 0;
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement.";
}

mysqli_close($conn);
?>
