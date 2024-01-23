<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $date = date("Y-m-d");
    $imagemaxsize = 5 * 1024 * 1024;

    if (isset($_SESSION['email'])) {
        $seller_email = $_SESSION['email'];
        

        $product_image = $_FILES['product_image'];
        if (isset($_FILES['product_image']) && $product_image['error'] === UPLOAD_ERR_OK) {
            $product_image = $_FILES['product_image'];

            if ($product_image['size'] < $imagemaxsize) {
                $product_image_content = file_get_contents($product_image['tmp_name']);

                $query = "INSERT INTO product (product_name, price, description, quantity, date, seller_email, product_image) 
                          VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $connect->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("sdssssb", $product_name, $price, $description, $quantity, $date, $seller_email, $product_image_content);

                    if ($stmt->execute()) {
                        $stmt->close();
                        $connect->close();
                        header("location:sell.php");
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                } else {
                    echo "Error preparing query: " . $connect->error;
                }
            } else {
                echo "Size error";
            }
        } else {
            echo "Error in file upload";
        }
    } else {
        echo "Error in email session";
    }
} else {
    echo "Error in request method";
}
?>
