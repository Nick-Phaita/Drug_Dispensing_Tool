<?php
require_once("../connection.php");
session_start();

$CompanyName = "";
$CompanyIDold = $CompanyIDnew = "";
$PhoneNo = "";
$Username = "";

$CompanyIDold = $_SESSION['CompanyID'];
$sql="SELECT * FROM PharmaCo WHERE CompanyID='$CompanyIDold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$CompanyName = $row["CompanyName"];
$CompanyIDold = $row["CompanyID"];
$PhoneNo = $row["PhoneNo"];
$Username = $row["Username"];

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $CompanyName = $_POST["CompanyName"];
    $CompanyIDnew = $_POST["CompanyID"];
    $PhoneNo = $_POST["PhoneNo"];
    $Username = $_POST["Username"];

    $sql="UPDATE PharmaCo SET CompanyID='$CompanyIDnew', CompanyName='$CompanyName', 
        PhoneNo = '$PhoneNo'
        WHERE CompanyID='$CompanyIDold'";

    $result = mysqli_query($conn, $sql);

    $_SESSION['Names'] = $CompanyName;
    $_SESSION['CompanyID'] = $CompanyIDnew;
        
    if($result){
        header("Location: ../dashboards/pharmaco_dashboard.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pharmaceutical Company</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Edit Pharmaceutical Company Details</h1>
    <form action="" method="post">
        <label for="Username">Username: </label><br>
        <input type="text" name="Username" id="Username" required value="<?php echo $Username?>" readonly><br>
        <label for="CompanyID">Company ID:</label><br>
        <input type="text" name="CompanyID" id="CompanyID" value="<?php echo $CompanyIDold?>" placeholder="Enter your company ID" required><br>
        <label for="">Company Name:</label><br>
        <input type="text" name="CompanyName" id="CompanyName" value="<?php echo $CompanyName?>" placeholder="Enter your company name" required><br>
        <label for="">Phone No:</label><br>
        <input type="text" name="PhoneNo" id="PhoneNo" value="<?php echo $PhoneNo?>" placeholder="Enter the company contact" required>
        <br><br>
        <input type="submit" name="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="cancel()">Cancel</button>


    </form>
</body>
</html>