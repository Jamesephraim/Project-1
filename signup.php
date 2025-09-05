

<?php
require "connect.php";

if (isset($_POST["rsubmit"])) {
    $roll = $_POST["roll"];
    $branch = $_POST["branch"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT); // Secure password
    // echo $roll;
    // echo $branch;
    // echo $pass;
    // Use prepared statement
     
    //$data="insert into register (ROLL_NO,BRANCH,pass) values ('".$roll."','".$branch."','".$pass."')";
    $s="update from register set BRANCH='$branch',pass='$pass' where ROLL_NO='$roll'" ;
    if(mysqli_query($conn,$s))
        echo "<script>alert('One Row updated successfully');</script>";
    else
        echo "<script>alert('Error !');</script>";
    


    // $s="select * from register";
    // $r=mysqli_query($conn,$s);
    // if(mysqli_num_rows($r) > 0)
    // {
    //     while( $row=mysqli_fetch_assoc($r) )
    //     {
    //     echo $row["ROLL_NO"];
    //     echo $row["BRANCH"];
    //     echo $row["PASS"];
    //     echo $row["marks"];
    //     echo "\n";
    //     }
    // }
    // else{
    //     echo "No data";
    // }
}
    

    mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: skyblue;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: darkblue;
            color: white;
            border: none;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-top: 15px;
            text-align: center;
        }

        a {
            color: darkblue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SIGN UP</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Roll No:</label>
                <input type="text" id="username" name="roll" required>
            </div>
            <div class="form-group">
                <label for="branch">Branch:</label>
                <input type="text" id="branch" name="branch" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="rsubmit" value="Register">
        </form>
        <p>Already registered? <a href="index.php">Login here</a>.</p>
    </div>
</body>
</html>
