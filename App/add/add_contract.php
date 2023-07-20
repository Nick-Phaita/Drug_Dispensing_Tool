<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Creation</title>
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
                                <h1>Sign-contract</h1>
                    </div>

        <div class="right-container">
                    <form action="" method="post">
                        <div class="field">
                        <label for="ContractID">Contract ID:</label><br>
                        <input type="text" id="ContractID" name="ContractID" placeholder="Enter the contract ID" required><br>
                        </div>

                        <div class="field-txtarea">
                        <label for="ContractText">Contract Text:</label><br>
                        <textarea name="ContractText" id="ContractText" cols="30" rows="10" placeholder="Enter the contract text"></textarea><br>
                        </div>

                        <div class="field">
                        <label for="StartDate">Start Date:</label><br>
                        <input type="date" name="StartDate" id="StartDate" required><br>
                        </div>

                        <div class="field">
                        <label for="EndDate">End Date:</label><br>
                        <input type="date" name="EndDate" id="EndDate" required><br>
                        </div>

                        <div class="field">
                        <label for="CompanyID">Company ID:</label><br>
                        <input type="text" id="CompanyID" name="CompanyID" value="<?php echo $_SESSION['CompanyID']?>" readonly required><br>
                        </div>

                        <div class="field">
                        <label for="PharmacyID">Pharmacy ID:</label><br>
                        <input type="text" id="PharmacyID" name="PharmacyID" placeholder="Enter pharmacy ID" required><br>
                        </div>

                        <div class="field">
                        <label for="SupervisorSSN">Supervisor SSN:</label><br>
                        <input type="number" id="SupervisorSSN" name="SupervisorSSN" placeholder="Enter the supervisor's SSN" required><br>
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

<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ContractID = $_POST["ContractID"];
        $ContractText = $_POST["ContractText"];
        $StartDate = $_POST["StartDate"];
        $EndDate = $_POST["EndDate"];
        $CompanyID = $_POST["CompanyID"];
        $PharmacyID = $_POST["PharmacyID"];
        $SupervisorSSN = $_POST["SupervisorSSN"];

        

       $sql="INSERT INTO Contracts (ContractID, ContractText, StartDate, EndDate, CompanyID, PharmacyID, SupervisorSSN) 
       VALUES ('$ContractID', '$ContractText', '$StartDate', '$EndDate', '$CompanyID', '$PharmacyID', $SupervisorSSN)";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    
    header("Location: ../dashboards/pharmaco_dashboard.php");

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>