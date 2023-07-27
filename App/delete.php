<?php 
// Applied for only admins and patients for now, due to referential integrity constraints
require_once("connection.php");
session_start();

$username = $_SESSION["Username"];


$sql = "DELETE FROM Users WHERE Username='$username'";
$result = mysqli_query($conn, $sql);

if($result == true){
    header("Location: login.html");
}


?>