<?php 
require_once("../connection.php");
//print_r($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
    $SSN = $_POST["SSN"];
    $Names = $_POST["Names"];
    $Gender = $_POST["Gender"];
    $Allergies = $_POST["Allergies"];
    $HeightinCm = $_POST["HeightinCm"];
    $WeightinKg = $_POST["WeightinKg"];
    $PatientAddress = $_POST["PatientAddress"];
    $DateOfBirth = $_POST["DateOfBirth"];
    $Username = $_POST["Username"];
    $PrimaryPhysicianSSN = $_POST['PrimaryPhysicianSSN'];
    
    $sql = "INSERT INTO Patients (SSN,Names,Gender,Allergies,HeightinCm,WeightinKg,PatientAddress,DateOfBirth,Username, PrimaryPhysicianSSN)
    VALUES ('$SSN','$Names','$Gender','$Allergies','$HeightinCm','$WeightinKg','$PatientAddress','$DateOfBirth','$Username', '$PrimaryPhysicianSSN')";
    
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