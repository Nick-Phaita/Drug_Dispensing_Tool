

<?php 
//make phone numbers unique

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
    Username VARCHAR(30) NOT NULL
)";

if($conn->query($sql) === TRUE){
    echo "Patients Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql = "ALTER TABLE Patients 
    ADD FOREIGN KEY (Username) REFERENCES Users (Username)";

if($conn->query($sql) === TRUE){
    echo "Username is now a foreign key";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql= "CREATE TABLE Doctors(
    SSN INT(9) UNSIGNED PRIMARY KEY,
    Names VARCHAR (50) NOT NULL,
    Speciality VARCHAR (50) NOT NULL,
    YearsOfExperience INT (2) NOT NULL,
    MedicalLicenseNo VARCHAR (10) NOT NULL,
    PhoneNo VARCHAR(15),
    Username VARCHAR(30) NOT NULL

)";

if($conn->query($sql) === TRUE){
    echo "Doctors Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/
/*$sql = "ALTER TABLE Doctors 
    ADD FOREIGN KEY (Username) REFERENCES Users (Username)";

if($conn->query($sql) === TRUE){
    echo "Username is now a foreign key";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql="CREATE TABLE Pharmacy (
    PharmacyID VARCHAR (10) PRIMARY KEY,
    PharmacyName VARCHAR (30) NOT NULL,
    PharmacyAddress VARCHAR (50),
    PhoneNo VARCHAR (15)
)";

if($conn->query($sql) === TRUE){
    echo "Pharmacy Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql="CREATE TABLE Pharmacist(
    SSN INT(9) UNSIGNED PRIMARY KEY,
    Names VARCHAR (50) NOT NULL,
    PharmacyID VARCHAR (10) NOT NULL,
    Username VARCHAR (30) NOT NULL
    
)";

if($conn->query($sql) === TRUE){
    echo "Pharmacist Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql = "ALTER TABLE Pharmacist 
    ADD (FOREIGN KEY (PharmacyID) REFERENCES Pharmacy (PharmacyID),
    FOREIGN KEY (Username) REFERENCES Users (Username))";

if($conn->query($sql) === TRUE){
    echo "Username and PharmacyID are now foreign keys";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql="CREATE TABLE Supervisor(
    SSN INT(9) UNSIGNED PRIMARY KEY,
    Names VARCHAR (50) NOT NULL,
    PharmacyID VARCHAR (10) NOT NULL,
    Username VARCHAR (30) NOT NULL
    
)";

if($conn->query($sql) === TRUE){
    echo "Supervisor Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql = "ALTER TABLE Supervisor
    ADD (FOREIGN KEY (PharmacyID) REFERENCES Pharmacy (PharmacyID),
    FOREIGN KEY (Username) REFERENCES Users (Username))";

if($conn->query($sql) === TRUE){
    echo "Username and PharmacyID are now foreign keys";
}else {
    echo "Error: " .$conn->error;
};*/


/*$sql="CREATE TABLE PharmaCo (
    CompanyID VARCHAR (10) PRIMARY KEY,
    CompanyName VARCHAR (30) NOT NULL,
    PhoneNo VARCHAR (15),
    Username VARCHAR (30) NOT NULL

)";

if($conn->query($sql) === TRUE){
    echo "PharmaCo Table created successfully";
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