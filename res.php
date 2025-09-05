<html>
    <head>
        <title>StudentResultManagementSystem</title>
        <link href="styles.css" rel="stylesheet" >
    </head>
    <body>
        <div class="container">
            <form action="" method="post">
                <h1>Student Form</h1>
                  <div class="textbox">
                  <input type="text" name="pin" id="pin" placeholder="Enter PIN" required>  
                </div>
                <div class="textbox">
                  <input type="text" name="uname" id="uname" placeholder="Enter UserName" required>  
                </div>
		<div class="textbox">
                  <select name="branch">
			<option value="">--Select Branch--</option>
			<option value="cme">CME</option>
			<option value="ece">ECE</option> 
		</select>
                </div>
		<div class="textbox">
                  <input type="number" name="marks" id="marks" placeholder="Enter Marks" required>  
                </div>
		<div class="btn">
		<input type="submit" value="submit" name="submit" />
		</div>
            </form>
        </div>
<?php
$server="localhost";
$uname="latha";
$passwd="latha123";
$db="student";
$conn=mysqli_connect($server,$uname,$passwd,$db);
if(!$conn)
{
die("connection failed");
}
if (isset($_POST["submit"]))
{
$pin=$_POST["pin"];
$name=$_POST["uname"];
$branch=$_POST["branch"];
$marks=$_POST["marks"];
$s="insert into results values('".$pin."','".$name."','".$branch."',".$marks.")" ;
if(mysqli_query($conn,$s))
echo "<script>alert('One Row Added successfully');</script>";
else
echo "<script>alert('Error !');</script>";
}
$s="select * from results";
$r=mysqli_query($conn,$s);
if(mysqli_num_rows($r) > 0)
{ 
echo "<table border='1'>";
echo "<tr><th>PIN</th><th>STUDENT NAME</th><th>BRANCH</th><th>MARKS</th><th>UPDATE DATA</th><th>DELETE DATA</th></tr>";
while( $row=mysqli_fetch_assoc($r) )
{
 $p=$row["pin"];
 $n=$row["name"];
 $b=$row["branch"];
 $m=$row["marks"];
echo "<tr><td> $p </td>";
echo "<td> $n </td>";
echo "<td> $b </td>";
echo "<td> $m  </td>";
//echo "<td><a href='update.php?pin=$p&name=$n&branch=$b&marks=$m'>EDIT</a></td>";
//echo "<td><a href='delete.php?pin=$p'>DELETE</a></td> </tr>";
}
}
else
{
echo "<script>alert('Empty Table');</script>";
}

mysqli_close($conn);
?>
    </body>
</html>