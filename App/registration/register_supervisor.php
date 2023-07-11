<?php 
require_once("../connection.php");
//print_r($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
    $SSN = $_POST["SSN"];
    $Names = $_POST["Names"];
    $PharmacyID = $_POST["PharmacyID"];
    $Username = $_POST["Username"];
    
    $sql = "INSERT INTO Supervisor (SSN,Names,PharmacyID,Username)
    VALUES ($SSN,'$Names','$PharmacyID','$Username')";
    
    if($conn->query($sql) === TRUE) {
        echo 
        "<script>alert('Data inserted successfully')</script>";
        header("Location: ../login.html ");
    }else {
        echo "Error: ".$sql."<br>".$conn->error;
    }}
    }catch(Exception){
        echo "<script>alert('Duplicate SSN entered')</script>";
    }

//$conn->close();

?>