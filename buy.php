<?php
include 'connect.php';
session_start();
?>



<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    echo "Purchase successful!"; 
} else {
    echo "Invalid product ID.";
}

$connect->close();
?>
