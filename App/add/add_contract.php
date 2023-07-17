<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Creation</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Add Contract</h1>

    <form action="" method="post">
        <label for="ContractID">Contract ID:</label><br>
        <input type="text" id="ContractID" name="ContractID" placeholder="Enter the contract ID" required><br>
        <label for="ContractText">Contract Text:</label><br>
        <textarea name="ContractText" id="ContractText" cols="30" rows="10" placeholder="Enter the contract text"></textarea><br>
        <label for="StartDate">Start Date:</label><br>
        <input type="date" name="StartDate" id="StartDate" required><br>
        <label for="EndDate">End Date:</label><br>
        <input type="date" name="EndDate" id="EndDate" required><br>
        <label for="CompanyID">Company ID:</label><br>
        <input type="text" id="CompanyID" name="CompanyID" value="<?php echo $_SESSION['CompanyID']?>" required><br>
        <label for="PharmacyID">Pharmacy ID:</label><br>
        <input type="text" id="PharmacyID" name="PharmacyID" placeholder="Enter pharmacy ID" required><br>
        <label for="SupervisorSSN">Supervisor SSN:</label><br>
        <input type="number" id="SupervisorSSN" name="SupervisorSSN" placeholder="Enter the supervisor's SSN" required><br><br>
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