<?php
include 'connect.php';
session_start();
echo $_POST['product_id'];

if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
        $stmt = $connect->prepare("UPDATE product SET quantity = quantity - ?  WHERE product_id = ?");
        $stmt->bind_param("ii",$quantity, $product_id);
        $stmt->execute();
// instert into (create the table 1st) orders what is the order product_name quantity price seller_email buyer_email paymentmethod location date
        header("location:orders.php");

    }
    else{
        echo "error in quantity delete";
    }
} else {

    echo "Invalid product ID.";
}

$connect->close();
?>
