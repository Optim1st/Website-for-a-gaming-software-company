<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "minority";
 
if (!$conn = mysqli_connect($host, $user, $password))
{
echo "<h2>MySQL Error!</h2>";
exit;
}
?>
