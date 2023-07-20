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
    <link rel="stylesheet" type="text/css" href="../styles/form.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
    <div class="form">
        <div class="left-container">
            <div class="icon">
            <h2 class="logo">Dispenzer</h2>
            </div>
            <h1>Edit Pharmaceutical Company Details</h1>
        </div>
   <div class="right-container">
                <form action="" method="post">
                    <div class="field">
                    <label for="Username">Username: </label><br>
                    <input type="text" name="Username" id="Username" required value="<?php echo $Username?>" readonly><br>
                    </div>

                    <div class="field">
                    <label for="CompanyID">Company ID:</label><br>
                    <input type="text" name="CompanyID" id="CompanyID" value="<?php echo $CompanyIDold?>" placeholder="Enter your company ID" required><br>
                    </div>

                    <div class="field">
                    <label for="">Company Name:</label><br>
                    <input type="text" name="CompanyName" id="CompanyName" value="<?php echo $CompanyName?>" placeholder="Enter your company name" required><br>
                    </div>

                    <div class="field">
                    <label for="">Phone No:</label><br>
                    <input type="text" name="PhoneNo" id="PhoneNo" value="<?php echo $PhoneNo?>" placeholder="Enter the company contact" required>
                    <br><br>
                    </div>
                    <br>
                    <input class="button" type="submit" name="Submit"><br><br>
                    <input class="button" type="reset" onclick="return confirm_reset();"><br><br>
                    <button class="button"onclick="return cancel()">Cancel</button>


                </form>
            </div>
    </div>
</body>
</html>