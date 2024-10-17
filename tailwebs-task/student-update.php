<?php
include('db_connect.php');

if(!isset($_POST['id'])){
    echo 'ID parameter not passed'; die;
}

$id = htmlspecialchars($_POST['id']);

if(!isset($_POST['name'])){
    echo 'Name parameter not passed'; die;
} else if($_POST['name'] == ''){
    echo 'Please fill your Name'; die;
}

$name = htmlspecialchars($_POST['name']);

if(!isset($_POST['subject'])){
    echo 'Subject parameter not passed'; die;
} else if($_POST['subject'] == ''){
    echo 'Please fill your Subject'; die;
}

$subject = htmlspecialchars($_POST['subject']);

if(!isset($_POST['mark'])){
    echo 'Mark parameter not passed'; die;
} else if($_POST['mark'] == ''){
    echo 'Please fill your Mark'; die;
}

$mark = htmlspecialchars($_POST['mark']);

// Prepare the SQL query with placeholders
$query = "UPDATE students SET name = ?, subject = ?, mark = ? WHERE id = ?";

// Prepare the statement
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, "ssii", $name, $subject, $mark, $id);

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
