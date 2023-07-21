<?php 
require_once("../connection.php");
session_start();
$SSNold = $SSNnew = "";
$Names = "";
$Specialty = "";
$YearsOfExperience = "";
$MedicalLicenseNo = "";
$PhoneNo = "";
$Username = "";

$SSNold = $_SESSION["SSN"];

$sql = "SELECT * FROM Doctors WHERE SSN = '$SSNold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$SSNold = $row["SSN"];
$Names = $row["Names"];
$Speciality = $row["Speciality"];
$YearsOfExperience = $row["YearsOfExperience"];
$LicenseNo = $row["MedicalLicenseNo"];
$PhoneNo = $row["PhoneNo"];
$Username = $row["Username"];

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $SSNnew = $_POST["SSN"];
    $Names = $_POST["Names"];
    $Speciality = $_POST["Speciality"];
    $YearsOfExperience = $_POST["YearsOfExperience"];
    $LicenseNo = $_POST["LicenseNo"];
    $PhoneNo = $_POST["PhoneNo"];
    $Username = $_POST["Username"];

    
    
    $sql = "UPDATE Doctors SET SSN='$SSNnew', Names='$Names', Speciality='$Speciality',
    YearsOfExperience='$YearsOfExperience', MedicalLicenseNo='$LicenseNo', PhoneNo='$PhoneNo'
    WHERE SSN='$SSNold'";
    $result1 = mysqli_query($conn, $sql);
    $_SESSION['Names'] = $Names;
    $_SESSION['SSN'] = $SSNnew;

    header("Location: ../dashboards/doctor_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
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
                        <h1>Edit Doctor Details</h1>
             </div>
         <div class="right-container">
            <form action="" method="post">
                <div class="field">
                <label for="Username">Username: </label><br>
                <input type="text" name="Username" id="Username" required value="<?php echo $Username?>" readonly><br>
                </div>

                <div class="field">
                <label for="SSN">Social Security Number:</label><br>
                <input type="text" id="SSN" name="SSN" required value="<?php echo $SSNold?>" placeholder="Enter your SSN"><br>
                </div>

                <div class="field">
                <label for="Names">Name:</label><br>
                <input type="text" name="Names" id="Names" required value="<?php echo $Names?>" placeholder="Enter your name"><br>
                </div>

                <div class="field">
                <label for="Speciality">Speciality:</label><br>
                <input type="text" name="Speciality" id="Speciality" value="<?php echo $Speciality?>" required placeholder="Enter your specialty"><br>
                </div>

                <div class="field">
                <label for="YearsOfExperience">Years of experience:</label><br>
                <input type="number" id="YearsOfExperience" name="YearsOfExperience" value="<?php echo $YearsOfExperience?>" required placeholder="Enter years"><br>
                </div>

                <div class="field">
                <label for="LicenseNo">Medical License Number: </label><br>
                <input type="text" name="LicenseNo" id="LicenseNo" value="<?php echo $LicenseNo?>" required placeholder="Enter your license number"><br>
                </div>

                <div class="field">
                <label for="PhoneNo">Phone Number: </label><br>
                <input type="text" name="PhoneNo" id="PhoneNo" value="<?php echo $PhoneNo?>" required placeholder="Enter your phone number"><br>
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