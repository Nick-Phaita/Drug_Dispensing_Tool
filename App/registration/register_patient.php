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
    $_SESSION['sccmmsg']="Patient Registered successfully";
//$conn->close();

?>