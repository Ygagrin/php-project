<?php 
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="search.css">
        <title>home</title>
    </head>
    <body>
        <nav class="navbar">
        <div class="nav-line"></div>
            <div class="navdiv">
                <div class="logo"> <a href="index.php"><img src="pictures/icon3.ico" alt="logo"><h2>PeerExchangePlace</h2></a> </div>
                <form action="index.php" method="get">
                        <input type="text" id="search" name="query" placeholder="Enter your search term">
                        <input type="submit" value="Search">
                </form>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <!-- <li><a href="about.html">About</a></li> -->
                        <?php
                         if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'] )&& ( $_SESSION['email'] )) {
                            echo'<li><a href="orders.php">My Orders</a></li>';
                            echo '<li><div class="name">' . $_SESSION['firstname'].' '.$_SESSION['lastname'] . '</div>';
                            echo '<button><a href="sell.php">Sell</a></button>';
                            echo '<button><a href="logout.php">Logout</a></button></li>';
                         } else {
                         echo '<li><button><a href="createaccount.php">Signup</a></button></li>';
                         echo '<li><button><a href="login.php">Login</a></button></li>';
                        }
                        ?>
                    </ul>
            </div>    
            <div class="nav-line"></div>
        </nav>
        <?php
        if (isset($_GET['query']) && !empty($_GET['query'])) {

            $search_query = $_GET['query'];
        
        
            $sql = "SELECT product_id,product_name, product_image, price, quantity FROM product WHERE description LIKE '%$search_query%'";
            $result = $connect->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<h2>Search Results:</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="product.php?product_id=' . $row['product_id'] . '"><div class="product-container"><div class="right">';
                    echo '<h2>' . $row['product_name'] . '</h2>';
                    echo '<img class="imageproduct" src="' . $row['product_image'] . '" alt="Product Image"></div>';
                    echo '<div class="items"><p>Price: $' . $row['price'] . '</p>';
                    echo '<p>Quantity: ' . $row['quantity'] . '</p>';
                    echo '</div></div></a>';
                }
            } else {
                echo "<p>No results found for '{$search_query}'</p>";
            }
        }
                    else{
                
            $query = "SELECT product_id,product_name, product_image, price, quantity FROM product ORDER BY date DESC";
            $result = $connect->query($query);

            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="product.php?product_id=' . $row['product_id'] . '"><div class="product-container"><div class="right">';
                    echo '<h2>' . $row['product_name'] . '</h2>';                  
                    echo '<img class="imageproduct" src="' . $row['product_image'] . '" alt="Product Image"></div>';
                    echo '<div class="items"> <p>Price: $' . $row['price'] . '</p>';
                    echo '<p>Quantity: ' . $row['quantity'] . '</p>';
                    echo '</div></div></a>';
                }
            } else {
                echo "No products found.";
            }
        }   

    ?>


        
    </body>
    </html>
<?php
$connect->close();
?>