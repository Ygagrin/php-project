<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h2><a href="index.php"> PeerExchangePlace</a></h2>
    </header>
    
    <div class="logincontainer">
        <form action="loginconnect.php" method="post">
            <h1>Login</h1>
            <div class="input">
                <input type="email" name="email" placeholder="email" required>
            </div> 
            <div class="input">
                <input type="password" name="password" placeholder="password" required>
            </div>     
            <button type="submit" class="logbutton">Login</button>
            <div class="createaccount">
                <p>Don't have account yet? <a href="createaccount.html">Create account</a></p>
            </div>
        </form>
        <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
            $error_message="Incorrect email or password!";
            echo "<h3>$error_message</h3>";
        }
        ?>
    </div>
</body>
</html>