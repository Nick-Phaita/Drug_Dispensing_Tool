<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensation</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Make Dispensation</h1>

    <form action="" method="post">
        <label for="DispensationID">Dispensation ID:</label><br>
        <input type="text" id="DispensationID" name="DispensationID" placeholder="Enter dispensation ID" required><br>
        <label for="PrescriptionID">Prescription ID:</label><br>
        <input type="text" id="PrescriptionID" name="PrescriptionID" placeholder="Enter the prescription ID" required><br>
        <label for="PharmacistSSN">Pharmacist SSN:</label><br>
        <input type="number" name="PharmacistSSN" id="PharmacistSSN" value="<?php echo $_SESSION['SSN']?>" required><br>
        <label for="DispensationDate">Date:</label><br>
        <input type="date" name="DispensationDate" id="DispensationDate" required><br><br>
        <input type="submit" value="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="cancel()">Cancel</button>
    </form>
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