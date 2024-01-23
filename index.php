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
        <title>home</title>
    </head>
    <body>
        <nav class="navbar">
        <div class="nav-line"></div>
            <div class="navdiv">
                <div class="logo"> <a href="index.php"><img src="pictures/icon3.ico" alt="logo"></a> </div>
                <form action="index.php" method="get">
                        <label for="search">Search:</label>
                        <input type="text" id="search" name="query" placeholder="Enter your search term">
                        <input type="submit" value="Search">
                </form>
                    <ul>
                        <li><a href="#">home</a></li>
                        <li><a href="about.html">about</a></li>
                        <?php
                         if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'] )&& ( $_SESSION['email'] )) {
                            echo '<li><div class="name">' . $_SESSION['firstname'].' '.$_SESSION['lastname'] . '</div>';
                            echo '<button><a href="sell.php">Sell</a></button>';
                            echo '<button><a href="logout.php">Logout</a></button></li>';
                         } else {
                         echo '<li><button><a href="createaccount.html">Signup</a></button></li>';
                         echo '<li><button><a href="login.php">Login</a></button></li>';
                        }
                        ?>
                    </ul>
            </div>    
            <div class="nav-line"></div>
        </nav>
        <?php
        if (isset($_GET['query'])) {

            $search_query = $_GET['query'];
        
        
            $sql = "SELECT * FROM product WHERE description LIKE '%$search_query%'";
            $result = $connect->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<h2>Search Results:</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>{$row['product_name']} - {$row['description']}</p>";
                }
            } else {
                echo "<p>No results found for '{$search_query}'</p>";
            }
        }
        ?>
        
    </body>
</html>