<?php
require_once("../connection.php");
session_start();

$ContractIDold = $ContractIDnew = "";
$ContractText = "";
$StartDate = "";
$EndDate = "";
$CompanyID = "";
$PharmacyID = "";
$SupervisorSSN = "";

$ContractIDold = $_GET["ContractID"];
$sql="SELECT * FROM Contracts WHERE ContractID='$ContractIDold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$ContractIDold = $row["ContractID"];
$ContractText = $row["ContractText"];
$StartDate = $row["StartDate"];
$EndDate = $row["EndDate"];
$CompanyID = $row["CompanyID"];
$PharmacyID = $row["PharmacyID"];
$SupervisorSSN = $row["SupervisorSSN"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ContractIDnew = $_POST["ContractID"];
    $ContractText = $_POST["ContractText"];
    $StartDate = $_POST["StartDate"];
    $EndDate = $_POST["EndDate"];
    $CompanyID = $_POST["CompanyID"];
    $PharmacyID = $_POST["PharmacyID"];
    $SupervisorSSN = $_POST["SupervisorSSN"];

    $sql="UPDATE Contracts SET ContractID='$ContractIDnew', ContractText = '$ContractText',
        StartDate='$StartDate', EndDate = '$EndDate', CompanyID = '$CompanyID', PharmacyID = '$PharmacyID',
        SupervisorSSN = '$SupervisorSSN' WHERE ContractID='$ContractIDold'";

    $result = mysqli_query($conn, $sql);
        
    if($result){
        header("Location: ../view/view_contracts.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contract</title>
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
                        <h1>Edit Contract</h1>
             </div>

            <div class="right-container">

            <form action="" method="post">
                <div class="field">
                <label for="ContractID">Contract ID:</label><br>
                <input type="text" id="ContractID" name="ContractID" value="<?php echo $ContractIDold?>" placeholder="Enter the contract ID" required><br>
                </div>

                <div class="field">
                <label for="PharmacyID">Pharmacy ID:</label><br>
                <input type="text" id="PharmacyID" name="PharmacyID" value="<?php echo $PharmacyID?>" placeholder="Enter pharmacy ID" required><br>
                </div>

                <div class="field">
                <label for="SupervisorSSN">Supervisor SSN:</label><br>
                <input type="number" id="SupervisorSSN" name="SupervisorSSN" value="<?php echo $SupervisorSSN?>" placeholder="Enter the supervisor's SSN" required><br>
                </div>

                <div class="field-txtarea">
                <label for="ContractText">Contract Text:</label><br>
                <textarea name="ContractText" id="ContractText" cols="30" rows="10" placeholder="Enter the contract text"><?php echo $ContractText?></textarea><br>
                </div>

                <div class="field">
                <label for="StartDate">Start Date:</label><br>
                <input type="date" name="StartDate" id="StartDate" value="<?php echo $StartDate?>" required><br>
                </div>

                <div class="field">
                <label for="EndDate">End Date:</label><br>
                <input type="date" name="EndDate" id="EndDate" value="<?php echo $EndDate?>" required><br>
                </div>

                <div class="field">
                <label for="CompanyID">Company ID:</label><br>
                <input type="text" id="CompanyID" name="CompanyID" value="<?php echo $CompanyID?>" required><br>
                </div>
                <br>

                <input class="button" type="submit" value="Submit">
                <input class="button" type="reset" onclick="return confirm_reset();">
                <input class="button" type="button" onclick="return cancel()" value="Cancel" >
                
            </form>
            </div>
    </div>
</body>
</html>