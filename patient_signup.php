<?php 
require_once("connection.php");
// uncomment to create table
/*$sql = "CREATE TABLE Patients (
    SSN INT(9) UNSIGNED PRIMARY KEY,
    Names VARCHAR(50) NOT NULL,
    Gender VARCHAR(15) NOT NULL,
    Allergies VARCHAR(100),
    HeightinCm INT(3),
    WeightinKg INT(3),
    PatientAddress VARCHAR(50),
    DateOfBirth DATE NOT NULL,
    UserPassword VARCHAR(30) NOT NULL
)";

if($conn->query($sql) === TRUE){
    echo "Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

$SSN = $_POST["SSN"];
$Names = $_POST["Names"];
$Gender = $_POST["Gender"];
$Allergies = $_POST["Allergies"];
$HeightinCm = $_POST["HeightinCm"];
$WeightinKg = $_POST["WeightinKg"];
$PatientAddress = $_POST["PatientAddress"];
$DateOfBirth = $_POST["DateOfBirth"];
$UserPassword = $_POST["UserPassword"];

$sql = "INSERT INTO Patients (SSN,Names,Gender,Allergies,HeightinCm,WeightinKg,PatientAddress,DateOfBirth,UserPassword)
VALUES ('$SSN','$Names','$Gender','$Allergies','$HeightinCm','$WeightinKg','$PatientAddress','$DateOfBirth','$UserPassword')";

if($conn->query($sql) === TRUE) {
    echo "New record inserted successfully";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>