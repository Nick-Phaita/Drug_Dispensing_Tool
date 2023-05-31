<?php 
require_once("connection.php");

$sqlretrieve = "SELECT * from Patients";
$result = $conn->query($sqlretrieve);
print_r($result);
$row = $result->fetch_assoc();
echo "<br>";
print_r($row);
echo "<br>";
echo $row['Names'];
echo "<br>";
echo $row['Gender'];
?>