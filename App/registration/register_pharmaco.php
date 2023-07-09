<?php 
require_once("../connection.php");
//print_r($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
    $CompanyName = $_POST["CompanyName"];
    $CompanyID = $_POST["CompanyID"];
    $PhoneNo = $_POST["PhoneNo"];
    $Username = $_POST["Username"];
    
    $sql = "INSERT INTO PharmaCo (CompanyID,CompanyName,PhoneNo,Username)
    VALUES ('$CompanyID','$CompanyName','$PhoneNo','$Username')";
    
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
/*/project-drug-dispenser/Drug_Dispensing_Tool-for chege configuration*/
?>