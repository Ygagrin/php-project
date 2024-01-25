<?php 
    session_start();
    include 'connect.php';
    
    if (!$connect) {
        die("Error: Database connection not established.");
    } else {
        echo "Database connection successful.";  
    }

    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    
    $query="SELECT  email, firstname, lastname, location FROM registration WHERE email = ? and password = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $email, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();
        $_SESSION['location']=$row['location'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        
        header("Location: index.php");

    } else {   

        header("Location: login.php?error=1");
}

$stmt->close();
$connect->close();
?>
