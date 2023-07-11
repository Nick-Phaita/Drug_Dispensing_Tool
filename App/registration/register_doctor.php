<?php 
require_once("../connection.php");
//print_r($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
    $SSN = $_POST["SSN"];
    $Names = $_POST["Names"];
    $Speciality = $_POST["Speciality"];
    $YearsOfExperience = $_POST["YearsOfExperience"];
    $LicenseNo = $_POST["LicenseNo"];
    $PhoneNo = $_POST["PhoneNo"];
    $Username = $_POST["Username"];
    
    $sql = "INSERT INTO Doctors (SSN,Names,Speciality,YearsOfExperience,MedicalLicenseNo,PhoneNo,Username)
    VALUES ($SSN,'$Names','$Speciality',$YearsOfExperience,'$LicenseNo','$PhoneNo','$Username')";
    
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