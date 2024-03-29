<?php
require_once("../connection.php");
session_start();


$DispensationIDold = $DispensationIDnew = "";
$PrescriptionID = "";
$PharmacistSSN = "";
$DispensationDate = "";

 
$DispensationIDold = $_GET["DispensationID"];
$sql="SELECT * FROM Dispensations WHERE DispensationID='$DispensationIDold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();
 
$DispensationIDold = $row["DispensationID"];
$PrescriptionID = $row["PrescriptionID"];
$PharmacistSSN = $row["PharmacistSSN"];
$DispensationDate = $row["DispensationDate"];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
    $DispensationIDnew = $_POST["DispensationID"];
    $PrescriptionID = $_POST["PrescriptionID"];
    $PharmacistSSN = $_POST["PharmacistSSN"];
    $DispensationDate = $_POST["DispensationDate"];

    
        

        $sql="UPDATE Dispensations SET DispensationID='$DispensationIDnew', PrescriptionID='$PrescriptionID',
        PharmacistSSN = '$PharmacistSSN', DispensationDate='$DispensationDate' 
        WHERE DispensationID='$DispensationIDold'";

        $result = mysqli_query($conn, $sql);
        
        if($result){
            header("Location: ../view/view_dispensations.php");
        }
        
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dispensation</title>
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
                        <h1>Edit Dispensation</h1>
             </div>
    
    <div class="right-container">
            <form action="" method="post">
                <div class="field">
                <label for="DispensationID">Dispensation ID:</label><br>
                <input type="text" id="DispensationID" name="DispensationID" value="<?php echo $DispensationIDold?>" placeholder="Enter dispensation ID" required><br>
                </div>

                <div class="field">
                <label for="PrescriptionID">Prescription ID:</label><br>
                <input type="text" id="PrescriptionID" name="PrescriptionID" value="<?php echo $PrescriptionID?>" readonly placeholder="Enter the prescription ID" required><br>
                </div>

                <div class="field">
                <label for="PharmacistSSN">Pharmacist SSN:</label><br>
                <input type="number" name="PharmacistSSN" id="PharmacistSSN" value="<?php echo $PharmacistSSN?>" readonly required><br>
                </div>

                <div class="field">
                <label for="DispensationDate">Date:</label><br>
                <input type="date" name="DispensationDate" id="DispensationDate" value="<?php echo $DispensationDate?>" required><br>
                </div>
                <br>
                <input class="button" type="submit" value="Submit">
                <input class="button" type="reset" onclick="return confirm_reset();">
                <input class="button" type="button" onclick="return cancel()" value="Cancel" >
            </form >    
    </div>
    </div>
</body>
</html>