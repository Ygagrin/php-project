<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>createaccount</title>
        <link rel="stylesheet" href="createaccount.css">
    </head>
    <body>
        <div class="creatingbox">
            <form action="createaccountconnect.php" class="createform" method="post">
                <h1>Sign up
                    <div class="logo">
                        <a href="index.php">
                            <img src="pictures/logo1.png" alt="logo">
                        </a>
                    </div>
                </h1>
                    <p><i>
                        Illuminate your trade , ignite connections   
                    </i></p>
                
                <div class="name">
                    <input type="text" placeholder="First Name" name="firstname" required>
                    <input type="text" placeholder="Last Name" name="lastname" required>
                </div>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                $error_message="Invalid Number";
                echo "<h3>$error_message</h3>";
             }
          ?>
                <div class="other"> 
                    <input type="tel" placeholder="Phone Number" name="number" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="password" name="password" required>
                </div>
                <button type="submit" class="createbutton">Create account</button>
                <button type="reset" class="createbutton">Reset</button>
            </form>
        </div>
    </body>
</html>