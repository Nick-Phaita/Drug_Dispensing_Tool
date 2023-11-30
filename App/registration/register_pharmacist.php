<?php 
require_once("../connection.php");
//print_r($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
    $SSN = $_POST["SSN"];
    $Names = $_POST["Names"];
    $PharmacyID = $_POST["PharmacyID"];
    $Username = $_POST["Username"];
    
    $sql = "INSERT INTO Pharmacist (SSN,Names,PharmacyID,Username)
    VALUES ($SSN,'$Names','$PharmacyID','$Username')";
    
    if($conn->query($sql) === TRUE) {
        echo 
        "<script>alert('Data inserted successfully')</script>";
        if($_SESSION['Usertype'] == "admin"){
            header("Location: ../dashboards/admin_dashboard.php");
        }else{
            header("Location: ../login(html).php ");
        }
    }else {
        echo "Error: ".$sql."<br>".$conn->error;
    }}
    }catch(Exception){
        echo "<script>alert('Duplicate SSN entered')</script>";
    }
    session_start();
    $_SESSION['sccmmsg']="Pharmacist Registered successfully";
//$conn->close();

?>