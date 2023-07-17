<?php
require_once("../connection.php");
session_start();

$TradeNameOld = $TradeNameNew = "";
$Formula = "";
$CompanyID = "";

$TradeNameOld = $_GET["TradeName"];
$sql="SELECT * FROM Drugs WHERE TradeName='$TradeNameOld'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$TradeNameOld = $row["TradeName"];
$Formula = $row["Formula"];
$CompanyID = $row["CompanyID"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $TradeNameNew = $_POST["TradeName"];
    $Formula = $_POST["Formula"];
    $CompanyID = $_POST["CompanyID"];

    $sql="UPDATE Drugs SET TradeName='$TradeNameNew', Formula = '$Formula',
        CompanyID = '$CompanyID' WHERE TradeName='$TradeNameOld'";

    $result = mysqli_query($conn, $sql);
        
    if($result){
        header("Location: ../view/view_drugs.php");
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Drugs</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Edit Drugs</h1>

    <form action="" method="post">
        <label for="TradeName">Drug Trade Name:</label><br>
        <input type="text" id="TradeName" name="TradeName" value="<?php echo $TradeNameOld?>" placeholder="Enter the drug trade name" required><br>
        <label for="Formula">Formula:</label><br>
        <input type="text" id="Formula" name="Formula" value="<?php echo $Formula?>" placeholder="Enter the formula" required><br>
        <label for="CompanyID">Company ID:</label><br>
        <input type="text" name="CompanyID" id="CompanyID" value="<?php echo $CompanyID?>" required><br><br>
        <input type="submit" value="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="cancel()">Cancel</button>
    </form>
</body>
</html>