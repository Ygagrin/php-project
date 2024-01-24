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
    $uploadFolder = '\project\uploaded/'; 

    if (isset($_SESSION['email'])) {
        $seller_email = $_SESSION['email'];

        $product_image = $_FILES['product_image'];

        if ($product_image['size'] < $imagemaxsize) {
            $fileName = uniqid() . "_" . $product_image['name']; 

           
            $targetFilePath = $uploadFolder . $fileName;
            if (move_uploaded_file($product_image['tmp_name'], $targetFilePath)) {

                //make if statment . if the product mawjod bl db bzeed l quanity (bejma3 old quantity m3 new q) product byet7dad bl image wl price wl seller_email eza haw nafs l shee bzed quan else b3nmel new one
                $query = "INSERT INTO product (product_name, price, description, quantity, date, seller_email, product_image) 
                          VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connect->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("sdsssss", $product_name, $price, $description, $quantity, $date, $seller_email, $targetFilePath);

                    if ($stmt->execute()) {
                        $stmt->close();
                        $connect->close();
                        header("location:sell.php?message=1");
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                } else {
                    echo "Error preparing query: " . $connect->error;
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File size is too big.";
        }
    } else {
        echo "Error in email session";
    }
} else {
    echo "Error in request method";
}
?>
