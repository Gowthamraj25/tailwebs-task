<?php
include('db_connect.php');

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
$created_at = date('Y-m-d h:i:s');

// Prepare a query to check if the record exists
$exist_record_query = "SELECT * FROM students WHERE name = ? AND subject = ?";
if ($stmt = mysqli_prepare($conn, $exist_record_query)) {
    mysqli_stmt_bind_param($stmt, "ss", $name, $subject);
    mysqli_stmt_execute($stmt);
    $exist_record_result = mysqli_stmt_get_result($stmt);
    
    if ($exist_record_result->num_rows > 0) {
        // Prepare an UPDATE statement if record exists
        $query = "UPDATE students SET mark = ? WHERE name = ? AND subject = ?";
        if ($update_stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($update_stmt, "iss", $mark, $name, $subject);
        }
    } else {
        // Prepare an INSERT statement if record does not exist
        $query = "INSERT INTO students(`name`, `subject`, `mark`, `created_at`) VALUES (?, ?, ?, ?)";
        if ($insert_stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($insert_stmt, "ssis", $name, $subject, $mark, $created_at);
        }
    }

    // Execute the appropriate query
    if (isset($update_stmt) && mysqli_stmt_execute($update_stmt)) {
        echo 1;
        mysqli_stmt_close($update_stmt);
    } elseif (isset($insert_stmt) && mysqli_stmt_execute($insert_stmt)) {
        echo 1;
        mysqli_stmt_close($insert_stmt);
    } else {
        echo 0;
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing SELECT statement.";
}

mysqli_close($conn);
?>
