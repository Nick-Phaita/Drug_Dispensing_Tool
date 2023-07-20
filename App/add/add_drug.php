<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drugs</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Add drug</h1>

    <form action="" method="post">
        <label for="TradeName">Drug Trade Name:</label><br>
        <input type="text" id="TradeName" name="TradeName" placeholder="Enter the drug trade name" required><br>
        <label for="Formula">Formula:</label><br>
        <input type="text" id="Formula" name="Formula" placeholder="Enter the formula" required><br>
        <label for="CompanyID">Company ID:</label><br>
        <input type="text" name="CompanyID" id="CompanyID" value="<?php echo $_SESSION['CompanyID']?>" required><br><br>
        <input type="submit" value="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="return cancel()">Cancel</button>
    </form>
</body>
</html>

<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $TradeName = $_POST["TradeName"];
        $Formula = $_POST["Formula"];
        $CompanyID = $_POST["CompanyID"];
        
        

       $sql="INSERT INTO Drugs (TradeName, Formula, CompanyID) 
       VALUES ('$TradeName', '$Formula', '$CompanyID')";

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