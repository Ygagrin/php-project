<?php
include('connect.php'); 
if (!$connect) {
    die("Error: Database connection not established.");
} else {
    echo "Database connection successful.";  
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];

if ($connect) {
    $query = "INSERT INTO registration(firstname, lastname, number, email, password) VALUES ('$firstname', '$lastname', '$number', '$email', '$password')";

    if (mysqli_query($connect, $query)) {
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    mysqli_close($connect);
} else {
    echo "Error: Database connection not established.";
}
?>
