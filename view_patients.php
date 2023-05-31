<?php 
require_once("connection.php");

$sqlretrieve = "SELECT * from Patients";
$result = $conn->query($sqlretrieve);
print_r($result);
?>