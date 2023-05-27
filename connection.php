<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drugDispenserDB";

$conn = new mysqli($servername,$username,$password,$dbname);
/*if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}echo "Connected successfully <br>";*/


//uncomment to create database
/*$sql = "CREATE DATABASE drugDispenserDB";
if($conn->query($sql) === TRUE){
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: ".$conn->error;
}*/



?>