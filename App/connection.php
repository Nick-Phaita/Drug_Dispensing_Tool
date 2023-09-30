

<?php 
//make phone numbers unique
//primary physician in patients table - done

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

/*$sql = "CREATE TABLE Admins (
    Username VARCHAR(30) PRIMARY KEY,
    Names VARCHAR(50) NOT NULL,
    EmailAddress VARCHAR(100) NOT NULL UNIQUE,
    PhoneNo VARCHAR(15) NOT NULL UNIQUE
)";

if($conn->query($sql) === TRUE){
    echo "Admins Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql = "ALTER TABLE Admins 
    ADD FOREIGN KEY (Username) REFERENCES Users (Username)";

if($conn->query($sql) === TRUE){
    echo "Username is now a foreign key";
}else {
    echo "Error: " .$conn->error;
};*/

/*ALTER TABLE `admins` DROP FOREIGN KEY `admins_ibfk_1`; ALTER TABLE `admins`
 ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users`(`Username`)
  ON DELETE CASCADE ON UPDATE CASCADE;*/



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

/*$sql = "ALTER TABLE PharmaCo 
    ADD FOREIGN KEY (Username) REFERENCES Users (Username)";

if($conn->query($sql) === TRUE){
    echo "Username is now a foreign key";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql="CREATE TABLE Contracts(
    ContractID VARCHAR(10) PRIMARY KEY,
    ContractText VARCHAR(100) NOT NULL,
    StartDate date NOT NULL,
    EndDate date NOT NULL, 
    CompanyID VARCHAR (10) NOT NULL,
    PharmacyID VARCHAR (10) NOT NULL,
    SupervisorSSN INT(9) UNSIGNED NOT NULL
    
)";

if($conn->query($sql) === TRUE){
    echo "Contracts Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql = "ALTER TABLE Contracts
    ADD (FOREIGN KEY (CompanyID) REFERENCES PharmaCo (CompanyID),
    FOREIGN KEY (PharmacyID) REFERENCES Pharmacy (PharmacyID),
    FOREIGN KEY (SupervisorSSN) REFERENCES Supervisor (SSN))";

if($conn->query($sql) === TRUE){
    echo "CompanyID, PharmacyID and SupervisorSSN are now foreign keys";
}else {
    echo "Error: " .$conn->error;
};*/


/*$sql="CREATE TABLE Drugs (
    TradeName VARCHAR (30) PRIMARY KEY ,
    Formula VARCHAR (30) NOT NULL,
    CompanyID VARCHAR (10) NOT NULL
)";

if($conn->query($sql) === TRUE){
    echo "Drugs Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
}*/

/*$sql = "ALTER TABLE Drugs 
    ADD (FOREIGN KEY (CompanyID) REFERENCES PharmaCo (CompanyID))";

if($conn->query($sql) === TRUE){
    echo "CompanyID is now a foreign key";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql="CREATE TABLE Inventory (
    PharmacyID VARCHAR (10),
    TradeName VARCHAR (30),
    Price VARCHAR(15) NOT NULL,
    ExpirationDate date NOT NULL,
    Stock INT(10) NOT NULL,
    PRIMARY KEY (PharmacyID, TradeName)
    
)";

if($conn->query($sql) === TRUE){
    echo "Inventory Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
};*/

/*$sql = "ALTER TABLE Inventory 
    ADD (FOREIGN KEY (PharmacyID) REFERENCES Pharmacy (PharmacyID),
    FOREIGN KEY (TradeName) REFERENCES Drugs (TradeName))";

if($conn->query($sql) === TRUE){
    echo "PharmacyID and TradeName are now foreign keys";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql="CREATE TABLE Prescriptions (
    PrescriptionID VARCHAR (10) PRIMARY KEY,
    TradeName VARCHAR (30) NOT NULL,
    Quantity VARCHAR (20) NOT NULL,
    DoctorSSN INT (9) UNSIGNED NOT NULL,
    PatientSSN INT (9) UNSIGNED NOT NULL,
    Instructions VARCHAR(100) NOT NULL,
    PrescriptionDate date NOT NULL
    
)";

if($conn->query($sql) === TRUE){
    echo "Prescriptions Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
};*/

/*$sql = "ALTER TABLE Prescriptions 
    ADD (FOREIGN KEY (TradeName) REFERENCES Drugs (TradeName),
    FOREIGN KEY (DoctorSSN) REFERENCES Doctors (SSN),
    FOREIGN KEY (PatientSSN) REFERENCES Patients (SSN))";

if($conn->query($sql) === TRUE){
    echo "TradeName, DoctorSSN and PatientSSN are now foreign keys";
}else {
    echo "Error: " .$conn->error;
};*/

/*$sql="CREATE TABLE Dispensations (
    DispensationID VARCHAR (10) PRIMARY KEY,
    PrescriptionID VARCHAR (10) NOT NULL,
    PharmacistSSN INT (9) UNSIGNED NOT NULL,
    DispensationDate date NOT NULL
    
)";

if($conn->query($sql) === TRUE){
    echo "Dispensations Table created successfully";
}else {
    echo "Error creating table: " .$conn->error;
};*/

/*$sql = "ALTER TABLE Dispensations 
    ADD (FOREIGN KEY (PrescriptionID) REFERENCES Prescriptions (PrescriptionID),
    FOREIGN KEY (PharmacistSSN) REFERENCES Pharmacist (SSN))";

if($conn->query($sql) === TRUE){
    echo "PrescriptionID and PharmacistSSN are now foreign keys";
}else {
    echo "Error: " .$conn->error;
};*/


/*ALTER TABLE `supervisor` DROP FOREIGN KEY `supervisor_ibfk_2`; ALTER TABLE `supervisor` 
ADD CONSTRAINT `supervisor_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `users`(`Username`) 
ON DELETE CASCADE ON UPDATE CASCADE;*/

/*ALTER TABLE `patients` DROP FOREIGN KEY `patients_ibfk_1`; ALTER TABLE `patients` 
ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users`(`Username`) 
ON DELETE CASCADE ON UPDATE CASCADE;*/

/*ALTER TABLE `doctors` DROP FOREIGN KEY `doctors_ibfk_1`; ALTER TABLE `doctors` 
ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users`(`Username`) 
ON DELETE CASCADE ON UPDATE CASCADE;*/

/*ALTER TABLE `pharmacist` DROP FOREIGN KEY `pharmacist_ibfk_1`; ALTER TABLE `pharmacist` 
ADD CONSTRAINT `pharmacist_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users`(`Username`) 
ON DELETE CASCADE ON UPDATE CASCADE;*/

/*ALTER TABLE `pharmaco` DROP FOREIGN KEY `pharmaco_ibfk_1`; ALTER TABLE `pharmaco` 
ADD CONSTRAINT `pharmaco_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users`(`Username`) 
ON DELETE CASCADE ON UPDATE CASCADE;*/

/*ALTER TABLE `patients` ADD `PrimaryPhysicianSSN` INT(9) UNSIGNED NOT NULL AFTER `Username`;*/

/*$sql = "ALTER TABLE Patients 
    ADD FOREIGN KEY (PrimaryPhysicianSSN) REFERENCES Doctors (SSN)";

if($conn->query($sql) === TRUE){
    echo "PrimaryPhysicianSSN is now a foreign key";
}else {
    echo "Error: " .$conn->error;
};*/

/*ALTER TABLE `patients` ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`PrimaryPhysicianSSN`)
 REFERENCES `doctors`(`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;*/ 

 /*ALTER TABLE `prescriptions` DROP FOREIGN KEY `prescriptions_ibfk_1`;
  ALTER TABLE `prescriptions` ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`TradeName`) 
  REFERENCES `drugs`(`TradeName`) ON DELETE CASCADE ON UPDATE CASCADE; 
  ALTER TABLE `prescriptions` DROP FOREIGN KEY `prescriptions_ibfk_2`; 
  ALTER TABLE `prescriptions` ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`DoctorSSN`) 
  REFERENCES `doctors`(`SSN`) ON DELETE CASCADE ON UPDATE CASCADE; 
  ALTER TABLE `prescriptions` DROP FOREIGN KEY `prescriptions_ibfk_3`; 
  ALTER TABLE `prescriptions` ADD CONSTRAINT `prescriptions_ibfk_3` FOREIGN KEY (`PatientSSN`) 
  REFERENCES `patients`(`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;
 */

 /*ALTER TABLE `supervisor` DROP FOREIGN KEY `supervisor_ibfk_1`; ALTER TABLE `supervisor` ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`PharmacyID`) REFERENCES `pharmacy`(`PharmacyID`) ON DELETE CASCADE ON UPDATE CASCADE; */

 /*ALTER TABLE `pharmacist` DROP FOREIGN KEY `pharmacist_ibfk_2`; ALTER TABLE `pharmacist` ADD CONSTRAINT `pharmacist_ibfk_2` FOREIGN KEY (`PharmacyID`) REFERENCES `pharmacy`(`PharmacyID`) ON DELETE CASCADE ON UPDATE CASCADE; */

 /* ALTER TABLE `inventory` DROP FOREIGN KEY `inventory_ibfk_1`; ALTER TABLE `inventory` ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`PharmacyID`) REFERENCES `pharmacy`(`PharmacyID`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `inventory` DROP FOREIGN KEY `inventory_ibfk_2`; ALTER TABLE `inventory` ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`TradeName`) REFERENCES `drugs`(`TradeName`) ON DELETE CASCADE ON UPDATE CASCADE;*/

 /*ALTER TABLE `drugs` DROP FOREIGN KEY `drugs_ibfk_1`; ALTER TABLE `drugs` ADD CONSTRAINT `drugs_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `pharmaco`(`CompanyID`) ON DELETE CASCADE ON UPDATE CASCADE; */

 /*ALTER TABLE `dispensations` DROP FOREIGN KEY `dispensations_ibfk_1`; ALTER TABLE `dispensations` ADD CONSTRAINT `dispensations_ibfk_1` FOREIGN KEY (`PrescriptionID`) REFERENCES `prescriptions`(`PrescriptionID`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `dispensations` DROP FOREIGN KEY `dispensations_ibfk_2`; ALTER TABLE `dispensations` ADD CONSTRAINT `dispensations_ibfk_2` FOREIGN KEY (`PharmacistSSN`) REFERENCES `pharmacist`(`SSN`) ON DELETE CASCADE ON UPDATE CASCADE; */

 /*ALTER TABLE `contracts` DROP FOREIGN KEY `contracts_ibfk_1`; ALTER TABLE `contracts` ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `pharmaco`(`CompanyID`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `contracts` DROP FOREIGN KEY `contracts_ibfk_2`; ALTER TABLE `contracts` ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`PharmacyID`) REFERENCES `pharmacy`(`PharmacyID`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `contracts` DROP FOREIGN KEY `contracts_ibfk_3`; ALTER TABLE `contracts` ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`SupervisorSSN`) REFERENCES `supervisor`(`SSN`) ON DELETE CASCADE ON UPDATE CASCADE; */

 /*ALTER TABLE Patients
MODIFY COLUMN PrimaryPhysicianSSN int NULL; */

/*ALTER TABLE `patients` DROP FOREIGN KEY `patients_ibfk_2`; ALTER TABLE `patients` ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`PrimaryPhysicianSSN`) REFERENCES `doctors`(`SSN`) ON DELETE SET NULL ON UPDATE CASCADE;*/
 
/*ALTER TABLE `contracts` DROP FOREIGN KEY `contracts_ibfk_3`; ALTER TABLE `contracts` ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`SupervisorSSN`) REFERENCES `supervisor`(`SSN`) ON DELETE RESTRICT ON UPDATE CASCADE; */

/*ALTER TABLE `dispensations` DROP FOREIGN KEY `dispensations_ibfk_2`; ALTER TABLE `dispensations` ADD CONSTRAINT `dispensations_ibfk_2` FOREIGN KEY (`PharmacistSSN`) REFERENCES `pharmacist`(`SSN`) ON DELETE RESTRICT ON UPDATE CASCADE;*/

/*ALTER TABLE `prescriptions` DROP FOREIGN KEY `prescriptions_ibfk_2`; ALTER TABLE `prescriptions` ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`DoctorSSN`) REFERENCES `doctors`(`SSN`) ON DELETE RESTRICT ON UPDATE CASCADE; ALTER TABLE `prescriptions` DROP FOREIGN KEY `prescriptions_ibfk_3`; ALTER TABLE `prescriptions` ADD CONSTRAINT `prescriptions_ibfk_3` FOREIGN KEY (`PatientSSN`) REFERENCES `patients`(`SSN`) ON DELETE RESTRICT ON UPDATE CASCADE; */
?>