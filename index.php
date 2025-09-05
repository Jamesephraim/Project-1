<?php
session_start();
 
?>
<?php

require 'connect.php';


?>


<html>
    <head>

</head>
    <body>
        <div class="container">
            <h1>SIGN IN</h1>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            <p>Don't have an account? <a href="signup.php">Register here</a>.</p>
        </div>
    </div>
        
    </body>

</html>