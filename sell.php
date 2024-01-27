<?php
include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="sell.css">
    <title>sell</title>
</head>
<body>
<nav class="navbar">
<div class="nav-line"></div>
            <div class="navdiv">
                <div class="logo"> <a href="index.php"><img src="pictures/icon3.ico" alt="logo"><h2>PeerExchangePlace</h2></a> </div>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <!-- <li><a href="about.html">About</a></li> -->

                        <?php
                         if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && ( $_SESSION['email'] )) {
                            echo'<li><a href="orders.php">My Orders</a></li></ul><ul>';
                            echo '<li><div class="name">' . $_SESSION['firstname'].' '.$_SESSION['lastname'] . '</div>';
                            echo '<button><a href="logout.php">Logout</a></button></li>';
                         }
                        ?>
                    </ul>
            </div>    
            <div class="nav-line"></div>
        </nav>
        <h1>Sell What Ever You Want</h1>
        <form action="sellconnect.php" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Product name" name="product_name" required>
            <input type="number" name="price" placeholder="Price" step="0.01" min="1" required>
            <input type="number" placeholder="Quantity" name="quantity" min="1" required>
            <input type="text" placeholder="Description" name="description" rows="4" required>
            <label for="product_image">Product image <5M</label>
            <input type="file" name="product_image" accept=".jpg, .jpeg, .png" required>
            <input type="submit" value="Add Product">
            </form>
            <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
            $product_id = $_POST['product_id'];
        
        
            $stmt = $connect->prepare("DELETE FROM product WHERE product_id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
                echo "Product deleted successfully.";
            $stmt->close();
        }
        
                         
        if (isset($_GET['message']) && $_GET['message'] == 1) {
            $message="Uploaded Successfully!";
            echo "<h3>$message</h3>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product_id = $_POST['product_id'];
            $new_quantity = $_POST['new_quantity'];
            $new_price = $_POST['new_price'];
        
            $updateQuery = "UPDATE product
                            SET quantity = $new_quantity, price = $new_price
                            WHERE product_id = $product_id";
        
            $result = mysqli_query($connect, $updateQuery);
        
            if ($result) {
                echo "Product updated successfully!";
            } else {
                echo "Error updating product: " . mysqli_error($connect);
            }
        }
        
            ?>
        
      
        <?php
        $email=$_SESSION['email'];
        $query="SELECT * FROM product WHERE seller_email = '$email' ";
        $result=$connect->query($query);

        if ($result === false) {
            echo "Error executing query: " . $connect->error;
        } else {
            if ($result->num_rows > 0) {
                echo '<div class="MyProducts"><h2>';
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>Product Name</th>';
                echo '<th>Product Image</th>';
                echo '<th>Date</th>';
                echo '<th>Price</th>';
                echo '<th>Quantity</th>';
                echo '<th>Description</th>';
                echo '<th>Modify</th>';
                echo '</tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['product_name'] . '</td>';
                    echo '<td><img src="' . $row['product_image'] . '"></td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td><form method="post" action="">';
                    echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                   echo ' <label for="new_quantity">New Quantity:</label>';
                   echo' <input type="number" name="new_quantity" required>';
                    echo'<label for="new_price">New Price:</label>';
                    echo'<input type="number" step="0.01" name="new_price" required>';
                    echo'<input type="submit" value="Update Product">'; 
                    echo '<button type="submit" name="delete_product">Delete</button>';
                    echo '</form></td>';
                    echo '</tr></div>';
                }
        
            }else{
                echo "<h2>No Products</h2>";
            }
        }
        //bdna n3mel hon my sells (bt3mel select mn db la 8rado seller_email)    fe y3mel delete change price ,quantity ...
       

        $connect->close();
            ?>

</body>
</html>