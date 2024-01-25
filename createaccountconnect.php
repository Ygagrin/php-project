<?php
include('connect.php'); 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];

if (!is_numeric($number) || strlen($number) !== 8) {
    header('location: createaccount.php?error=1');
    exit;
}
else{
    $query = "INSERT INTO registration(firstname, lastname, number, email, password) VALUES (? ,? ,? ,? ,?)";
    $stmt = $connect->prepare($query);
        $stmt->bind_param("ssiss", $firstname, $lastname, $number, $email, $password);

        $stmt->execute();
        $stmt->close();
        $connect->close();
    header('location:login.php');}
?>
