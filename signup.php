


<?php
session_start();

?>
<?php
require "connect.php";
///opt/lampp/htdocs/OnlineExam/signup.php
if (isset($_POST["rsubmit"]))
{ 
    if($_POST["role"] == "student")
    {    
        $roll = $_POST["roll"];
        $branch = $_POST["branch"];
        $pass =  $_POST["password"] ; // Secure password

        $check="select * from register where ROLL_NO='$roll'";
        $q=mysqli_query($conn,$check);
        if(mysqli_num_rows($q) > 0)
        {
            echo "<script>alert($roll+' Already Registered');</script>";
        }
        else
        {
            $data="INSERT INTO register(ROLL_NO,BRANCH,pass) VALUES ( '$roll','$branch','$pass')";
            $res=mysqli_query($conn,$data);
            
            if($res)
            {
                echo "<script>alert('User '+$roll+' Successfully Registered');</script>";
            }
            else
                echo "<script>alert('Error !');</script>";
        }
    }
     
    else if($_POST["role"] == "hod")
    {
         
        $roll = $_POST["roll"];
        $branch = $_POST["branch"];
        $pass =  $_POST["password"] ; // Secure password
        $check="select * from staff_users where EMP_ID='$roll'";
        $q=mysqli_query($conn,$check);
        if(mysqli_num_rows($q) > 0)
        {
            echo "<script>alert($roll+' Already Registered');</script>";
        }
        else
        {
        
            $data="INSERT INTO staff_users(EMP_ID,BRANCH,pass) VALUES ( '$roll','$branch','$pass')";
            $res=mysqli_query($conn,$data);
            
            if($res)
            {
                 
                echo "<script>alert('User '+$roll+' Successfully Registered');</script>";
            }
                //echo "<script>alert('One Row updated successfully');</script>";
            else
                echo "<script>alert('Error !');</script>";
        }
    }
    
        
}

else if (isset($_POST["login"]))
{
    // echo "<script>alert('Welcome TO Login');</script>";
    if($_POST["role"] == "student")
    {
        $roll = $_POST["roll"];
        $branch = $_POST["branch"];
        $pass =  $_POST["password"] ; // Secure password
         
        $s="select * from register where ROLL_NO='$roll'";
        $r=mysqli_query($conn,$s);
        if(mysqli_num_rows($r) > 0)
        {
            while( $row=mysqli_fetch_assoc($r) )
            {
                $p=$row["pass"];
                if(($row["BRANCH"] == $branch) && ($pass == $p))
                {
                    $_SESSION['Roll']=$roll;
                    $_SESSION['branch']=$branch;
                     
                    header("Location: dashboard.php");
                    exit;
                }
                else{
                    echo "<script>alert('Invalid User');</script>";
                }
                 
             
            }
        }
        else{
            echo "<script>alert($roll+' is Invalid User');</script>";
        }
    }
    else if($_POST["role"] == "hod")
    {
        $roll = $_POST["roll"];
        $branch = $_POST["branch"];
        $pass =  $_POST["password"] ; // Secure password
         
        $s="select * from staff_users where EMP_ID='$roll'";
        $r=mysqli_query($conn,$s);
        if(mysqli_num_rows($r) > 0)
        {
            while( $row=mysqli_fetch_assoc($r) )
            {

                $p=$row["Pass"];
                if(($row["BRANCH"] == $branch) && ($pass == $p))
                { 

                }
            }
        }
        else{
            echo "<script>alert('Employee '+$roll+' is Invalid User');</script>";
        }
    }
}
    

    mysqli_close($conn);

?> 

<?php

// $s="select * from register";
    // $r=mysqli_query($conn,$s);
    // if(mysqli_num_rows($r) > 0)
    // {
    //     while( $row=mysqli_fetch_assoc($r) )
    //     {
    //     echo $row["ROLL_NO"];
    //      echo $row["BRANCH"];
    //      echo $row["PASS"];
    //      echo $row["marks"];
    //     echo "\n";
    //     }
    // }
    // else{
    //     echo "No data";
    // }

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
        #role,#role2{
            height:30px;
            text-align: center;
            margin-bottom: 15px;
            width: 100%;
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
            margin-bottom: 10px;
            
        }
        /* input[type="submit"]: hover{
            background-color: white;
            color: darkblue;
            border: 2 px solid darkblue;
            border-radius: 5px;
        } */

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
            <div class="form-select">
            <label for="role">Role:</label>
                <select id="role" name="role" >
                        <option value="">--Select--</option>
                        <option value="hod">HOD</option>
                        <option value="student">Student</option>
                </select>
            </div>
            <div class="form-group">
             
                <label for="username">No:</label>
                <input type="text" id="username" name="roll" required>
            </div>
            <div class="form-select">
            <label for="role2">Branch:</label>
                <select id="role2" name="branch"  >
                        <option value="">--Select--</option>
                        <option value="AI&DS">AI&DS</option>
                        <option value="AIML">AIML</option>
                        <option value="CIC">CIC</option>
                        <option value="CIV">CIV</option>
                        <option value="CME">CME</option>
                        <option value="CSM">CSM</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="IT">IT</option>
                         
                        <option value="MECH">MECH</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="rsubmit" value="Register">
            <input type="submit" name="login" value="Login">
             
        </form>
        <!-- <p>Already registered? <a href="index.php">Login here</a></p> -->
    </div>
</body>
</html>
