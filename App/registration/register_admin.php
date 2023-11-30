<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
    $Username = $_POST["Username"];
    $Names = $_POST["Names"];
    $EmailAddress = $_POST["EmailAddress"];
    $PhoneNo = $_POST["PhoneNo"];
    
    
    $sql = "INSERT INTO Admins (Username,Names,EmailAddress,PhoneNo)
    VALUES ('$Username','$Names','$EmailAddress','$PhoneNo')";
    
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
        echo "<script>alert('Duplicate entered')</script>";
    }
    session_start();
    $_SESSION['sccmmsg']="Admin Registered successfully";

?>