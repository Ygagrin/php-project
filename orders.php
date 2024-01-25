
<?php
include 'connect.php';
session_start();

$product=$_SESSION['product'];
$seller_email=$_SESSION['seller_email'];
$customer_email=$_SESSION['email'];
$location=$_SESSION['location'];
$price=$_SESSION['price'];
$date=date("Y-m-d H:i:s");
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
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
            $quantity = $_POST['quantity'];
            $stmt = $connect->prepare("UPDATE product SET quantity = quantity - ?  WHERE product_id = ?");
            $stmt->bind_param("ii",$quantity, $product_id);
            $stmt->execute();
        $payments=$quantity*$price;
        $stmt2 = $connect->prepare("INSERT INTO orders (product, customer_email, seller_email, location, total_payments, order_date, price, quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("ssssdsdi", $product, $customer_email, $seller_email, $location, $payments, $date, $price, $quantity);
        $stmt2->execute();
        $stmt2->close();
        echo "<h2>My Orders</h2>";
        }
        else{
            echo "error in quantity delete";
        } 
        }
        else {
            echo "<h2>My Orders</h2>";
        }
    $query1="SELECT * FROM orders WHERE customer_email = '$customer_email'";
    $result=$connect->query($query1);
    
    
if ($result === false) {
    echo "Error executing query: " . $connect->error;
} else {
    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Product</th>';
        echo '<th>Seller Email</th>';
        echo '<th>Payments</th>';
        echo '<th>Date</th>';
        echo '<th>Price</th>';
        echo '<th>Quantity</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['product'] . '</td>';
            echo '<td>' . $row['seller_email'] . '</td>';
            echo '<td>' . $row['total_payments'] . '</td>';
            echo '<td>' . $row['order_date'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '</tr>';
        }

    }else{
        echo "<h2>No Orders</h2>";
    }
}

$connect->close();
?>



