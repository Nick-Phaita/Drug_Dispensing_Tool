<?php
require_once("../connection.php");
session_start();

$PharmacyIDold = $PharmacyIDnew = "";
$PharmacyName = "";
$PharmacyAddress = "";
$PhoneNo = "";

$PharmacyIDold = $_SESSION['PharmacyID'];
$sql="SELECT * FROM Pharmacy WHERE PharmacyID='$PharmacyIDold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$PharmacyIDold = $row["PharmacyID"];
$PharmacyName = $row["PharmacyName"];
$PharmacyAddress = $row["PharmacyAddress"];
$PhoneNo = $row["PhoneNo"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $PharmacyIDnew = $_POST["PharmacyID"];
    $PharmacyName = $_POST["PharmacyName"];
    $PharmacyAddress = $_POST["PharmacyAddress"];
    $PhoneNo=$_POST["PhoneNo"];

    $sql="UPDATE Pharmacy SET PharmacyID='$PharmacyIDnew', PharmacyName='$PharmacyName', 
        PharmacyAddress = '$PharmacyAddress', PhoneNo = '$PhoneNo'
        WHERE PharmacyID='$PharmacyIDold'";

    $result = mysqli_query($conn, $sql);
    $_SESSION['PharmacyID'] = $PharmacyIDnew;
        
    if($result){
        header("Location: ../dashboards/supervisor_dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pharmacy</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Edit Pharmacy Details</h1>

    <form action="" method="post">
        <label for="PharmacyID">Pharmacy ID:</label><br>
        <input type="text" id="PharmacyID" name="PharmacyID" value='<?php echo $PharmacyIDold?>' placeholder="Enter pharmacy ID" required><br>
        <label for="PharmacyName">Pharmacy Name:</label><br>
        <input type="text" id="PharmacyName" name="PharmacyName" value='<?php echo $PharmacyName?>' placeholder="Enter the name" required><br>
        <label for="PharmacyAddress">Pharmacy Address:</label><br>
        <input type="text" name="PharmacyAddress" id="PharmacyAddress" value='<?php echo $PharmacyAddress?>' placeholder="Enter your address" required><br>
        <label for="PhoneNo">Phone Number:</label><br>
        <input type="number" name="PhoneNo" id="PhoneNo" value='<?php echo $PhoneNo?>' placeholder="Enter Phone no." required><br><br>
        <input type="submit" value="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="cancel()">Cancel</button>
    </form>
</body>
</html>