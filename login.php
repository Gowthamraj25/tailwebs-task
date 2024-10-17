<?php
include('db_connect.php');

if(!isset($_POST['email'])){
    echo 'Email parameter not passed'; die;
} elseif($_POST['email'] == ''){
    echo 'Please fill your Email'; die;
}

if(!isset($_POST['password'])){
    echo 'Password parameter not passed'; die;
} elseif($_POST['password'] == ''){
    echo 'Please fill your Password'; die;
}

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

// Prepare the SQL query to prevent SQL injection
$query = $conn->prepare("SELECT * FROM admin WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

if($result->num_rows == 0){
    echo 0;
} else {
    $row = $result->fetch_assoc();
    
    // Verify the password
    if(password_verify($password, $row['password'])){
        session_start();
        
        $_SESSION['session_name'] = $row['name'];
        $_SESSION['session_email'] = $row['email'];
        $_SESSION['session_id'] = $row['id'];
        
        echo 1; // Login successful
    } else {
        echo 0; // Incorrect password
    }
}
?>
