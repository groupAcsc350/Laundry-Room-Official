
<?php
$user = isset($_POST["username"]) ? $_POST["username"] : '';
$pass = isset($_POST["password"]) ? $_POST["password"] : '';

 
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'laundry';


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if(! $con)
{
     error_log("Failed to connect to MySQL: " . mysqli_error($con));
    die('Internal server error');
}
 
$db_select = mysqli_select_db($con, "laundry");
if (!$con) {
    error_log("Database selection failed: " . mysqli_error($con));
    die('Internal server error');
}

$sql = "select username, password from users where username = '".$user."'";

$result = mysqli_query($con,$sql) or die( mysqli_error($con));


$row = mysqli_fetch_array($result);

if($row["username"]==$user && $row["password"]==$pass)
    include "reservation.php";
else
	echo '<script type="text/javascript">alert("Wrong username or password. If you are having problems with your login credentials please contact us (000) 000-0000 or try again.");window.location=\'login.php\';</script>';
?>




