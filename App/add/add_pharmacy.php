<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add pharmacy</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <!--<link rel="stylesheet" type="text/css" href="../styles/form.css">-->
        <script type="text/javascript" src="../scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/form.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
    <div class="form">
            <div class="left-container">
                <div class="icon">
                    <h2 class="logo">Dispenzer</h2>
                </div>
                <h1>Add pharmacy</h1>
            </div>

        <div class="right-container">

         <form action="" method="post">
            <div class="field">
           <label for="PharmacyID">Pharmacy ID:</label><br>
            <input type="text" id="PharmacyID" name="PharmacyID" placeholder="Enter pharmacy ID" required><br>
            </div>

            <div class="field">
                <label for="PharmacyName">Pharmacy Name:</label><br>
                <input type="text" id="PharmacyName" name="PharmacyName" placeholder="Enter the name" required><br>
            </div>

            <div class="field">
                <label   label for="PharmacyAddress">Pharmacy Address:</label><br>
                <input type="text" name="PharmacyAddress" id="PharmacyAddress" placeholder="Enter your address" required><br>
            </div>

            <div class="field">
             <label for="PhoneNo">Phone Number:</label><br>
             <input type="number" name="PhoneNo" id="PhoneNo" placeholder="Enter Phone no." required><br><br>
            </div>

            <br>

                <input class="button"   type="submit" value="Submit"><br><br>
                <input class="button" type="reset" onclick="return confirm_reset();">
                <input  class="button" type="cancel" onclick="return cancel()" value="Cancel">
        
            </form><br>
        </div>
     
     </div>
</body>
</html>

<?php
require_once("../connection.php");

try{
    if(isset($_POST['Submit'])){
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