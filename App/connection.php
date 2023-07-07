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

/*$sql = "CREATE TABLE Users (
    Username VARCHAR(30) PRIMARY KEY,
    Password VARCHAR(30) NOT NULL,
    Usertype VARCHAR(25) NOT NULL
    )";

if($conn->query($sql) === TRUE){
    echo "Users Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

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
    echo "Patients Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql= "CREATE TABLE Doctors(
    SSN INT(9) UNSIGNED PRIMARY KEY,
    Names VARCHAR (50) NOT NULL,
    Speciality VARCHAR (100),
    Years_of_experience INT (5),
    Doctorpassword VARCHAR (50)

)";

if($conn->query($sql) === TRUE){
    echo "Doctors Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql="CREATE TABLE Pharmacist(
    SSN INT(9) UNSIGNED PRIMARY KEY,
    Names VARCHAR (50) NOT NULL,
    Pharmacy_name VARCHAR (23),
    Pharmacistpassword VARCHAR (50)
)";

if($conn->query($sql) === TRUE){
    echo "Pharmacist Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql="CREATE TABLE Pharmacy (
    CompanyID INT (100) UNSIGNED PRIMARY KEY,
    Pharname VARCHAR (100) NOT NULL,
    Addresss VARCHAR (100),
    Phone_no INT (10)
)";

if($conn->query($sql) === TRUE){
    echo "Pharmacy Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql="CREATE TABLE admin_drug (
    SSN INT (10) UNSIGNED PRIMARY KEY ,
    Apassword VARCHAR (100)
)";

if($conn->query($sql) === TRUE){
    echo "Admin Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/


?>