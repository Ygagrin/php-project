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
    <link rel="stylesheet" href="product.css">
    <title>product</title>
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
                    if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'] )&& ( $_SESSION['email'] )) {
                            echo' <li><a href="orders.php">My Orders</a></li></ul><ul>';
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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
                $product_id = $_POST['product_id'];
            
            
                $stmt = $connect->prepare("DELETE FROM product WHERE product_id = ?");
                $stmt->bind_param("i", $product_id);
                $stmt->execute();
                    echo "Product deleted successfully.";
                $stmt->close();
            }
        
                    
            if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
                $product_id = $_GET['product_id'];
                
                $stmt = $connect->prepare("SELECT * FROM product WHERE product_id = ?");
                $stmt->bind_param("i", $product_id);
                $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $_SESSION['seller_email']=$row['seller_email'];
                $_SESSION['price']=$row['price'];
                $_SESSION['product']=$row['product_name'];

                echo '<div class="product-container"><div class="right">';
                echo '<h2>' . $row['product_name'] . '</h2>';
                echo '<img class="imageproduct" src="' . $row['product_image'] . '" alt="Product Image"></div>';
                echo '<div class="items"><p>Price: $' . $row['price'] . '</p>';
                echo '<p>Quantity: ' . $row['quantity'] . '</p>';
                echo '<p>Description: ' . $row['description'] . '</p>';
                echo '</div></a>';
                
             
                if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'] )&& isset( $_SESSION['email'] )){
                    if($row['seller_email']== $_SESSION['email']){
                        echo '<form class="delete" method="post" action="">';
                        echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                        echo '<input type="submit"  name="delete_product" value="Delete">';
                        echo '</form></div>';
                        
                    }
                    else{
              echo '<form method="post" class="buy" action="orders.php">';
              echo ' <label for="quantity">Quantity:</label>';
              echo '<input type="number" name="quantity" id="quantity" min="1" max="' . $row['quantity'] . '" required>';
              echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
              echo '<input type="submit" name="buy_product" value="Buy">';
              echo '</form></div>';
              
                }    
            }
                else{
                    echo '<a class="log" href="login.php">Login To Buy</a></div>';
                
                }
            } else {
                echo "Product not found.";
            }
            $stmt->close();
        } else {
            echo "Invalid product ID.";
        }
        
        $connect->close();
        ?>
        

    </body>
</html>

