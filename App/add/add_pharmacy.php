<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Registration</title>
</head>
<body>
    <h1>Pharmacy Registration</h1>

    <form action="" method="post">
        <label for="PharmacyID">Pharmacy ID:</label><br>
        <input type="text" id="PharmacyID" name="PharmacyID" placeholder="Enter pharmacy ID" required><br>
        <label for="PharmacyName">Pharmacy Name:</label><br>
        <input type="text" id="PharmacyName" name="PharmacyName" placeholder="Enter the name" required><br>
        <label for="PharmacyAddress">Pharmacy Address:</label><br>
        <input type="text" name="PharmacyAddress" id="PharmacyAddress" placeholder="Enter your address" required><br>
        <label for="PhoneNo">Phone Number:</label><br>
        <input type="number" name="PhoneNo" id="PhoneNo" placeholder="Enter Phone no." required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $PharmacyID = $_POST["PharmacyID"];
        $PharmacyName = $_POST["PharmacyName"];
        $PharmacyAddress = $_POST["PharmacyAddress"];
        $PhoneNo=$_POST["PhoneNo"];
        

       $sql="INSERT INTO Pharmacy (PharmacyID, PharmacyName,PharmacyAddress,PhoneNo) 
       VALUES ('$PharmacyID','$PharmacyName','$PharmacyAddress','$PhoneNo')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    
    header("Location: ../dashboards/admin_dashboard.php");

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>