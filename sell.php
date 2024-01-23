<?php
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
                <div class="logo"> <a href="index.php"><img src="pictures/icon3.ico" alt="logo"></a> </div>
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="about.html">about</a></li>
                    </ul>       
                    <ul>
                        <?php
                         if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && ( $_SESSION['email'] )) {
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
            <input type="file" name="product_image" accept="image/*" required>
            <input type="submit" value="Add Product">
        </form>

</body>
</html>