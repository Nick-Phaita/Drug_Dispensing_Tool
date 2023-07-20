<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensation</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <!--<link rel="stylesheet" type="text/css" href="../styles/form.css">-->
        <script type="text/javascript" src="../scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/form.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <link rel="stylesheet" type="text/css" href="styles/login-signup_form.css">
</head>
<body>
    <div class="form">
            <div class="left-container">
                        <div class="icon">
                            <h2 class="logo">Dispenzer</h2>
                        </div>
                        <h1>Dispense Drug</h1>
             </div>
        <div class="right-container">
            <form action="" method="post">
                <div class="field">
                <label for="DispensationID">Dispensation ID:</label><br>
                <input type="text" id="DispensationID" name="DispensationID" placeholder="Enter dispensation ID" required><br>
                </div>

                <div class="field">
                <label for="PrescriptionID">Prescription ID:</label><br>
                <input type="text" id="PrescriptionID" name="PrescriptionID" placeholder="Enter the prescription ID" required><br>
                </div>

                <div class="field">
                <label for="PharmacistSSN">Pharmacist SSN:</label><br>
                <input type="number" name="PharmacistSSN" id="PharmacistSSN" value="<?php echo $_SESSION['SSN']?>" required><br>
                </div>

                <div class="field">
                <label for="DispensationDate">Date:</label><br>
                <input type="date" name="DispensationDate" id="DispensationDate" required><br>
                </div>
                <br>

                <input class="button"type="submit" value="Submit"><br><br>
                <input  class="button"type="reset" onclick="return confirm_reset();"><br><br>
                <input  class="button" type="cancel" onclick="return cancel()" value="Cancel">
                
            </form>
        </div>
    </div>
</body>
</html>

<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $DispensationID = $_POST["DispensationID"];
        $PrescriptionID = $_POST["PrescriptionID"];
        $PharmacistSSN = $_POST["PharmacistSSN"];
        $DispensationDate = $_POST["DispensationDate"];
        

       $sql="INSERT INTO Dispensations (DispensationID, PrescriptionID,PharmacistSSN,DispensationDate) 
       VALUES ('$DispensationID','$PrescriptionID',$PharmacistSSN,'$DispensationDate')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    
    header(("Location: ../dashboards/pharmacist_dashboard.php"));

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>