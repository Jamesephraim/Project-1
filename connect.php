<?php

$server="localhost";
$user="root";
$pass="";
$db="mydb";
 

$conn=mysqli_connect($server,$user,$pass,$db);
 
if($conn)
{
    echo "Connected";
}
 
 

else
echo "Not Connected ";

?>




 