<?php 
require_once("../connection.php");
session_start();
$SSNold = $SSNnew = "";
$Names = "";
$Gender = "";
$Allergies = "";
$HeightinCm = "";
$WeightinKg = "";
$PatientAddress = "";
$DateOfBirth = "";
$Username = "";
$PrimaryPhysicianSSN = "";

$SSNold = $_SESSION["SSN"];

$sql = "SELECT * FROM Patients WHERE SSN = '$SSNold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$SSNold = $row['SSN'];
$Names = $row['Names'];
$Gender = $row['Gender'];
$Allergies = $row['Allergies'];
$HeightinCm = $row['HeightinCm'];
$WeightinKg = $row['WeightinKg'];
$PatientAddress = $row['PatientAddress'];
$DateOfBirth = $row['DateOfBirth'];
$Username = $row['Username'];
$PrimaryPhysicianSSN = $row['PrimaryPhysicianSSN'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $SSNnew = $_POST['SSN'];
    $Names = $_POST['Names'];
    $Gender = $_POST['Gender'];
    $Allergies = $_POST['Allergies'];
    $HeightinCm = $_POST['HeightinCm'];
    $WeightinKg = $_POST['WeightinKg'];
    $PatientAddress = $_POST['PatientAddress'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $Username = $_POST['Username'];
    $PrimaryPhysicianSSN = $_POST['PrimaryPhysicianSSN'];

    

    $sql="UPDATE Patients SET SSN='$SSNnew', Names='$Names', Gender='$Gender', Allergies = '$Allergies',
        HeightinCm='$HeightinCm', WeightinKg='$WeightinKg', PatientAddress='$PatientAddress', 
        DateOfBirth='$DateOfBirth', PrimaryPhysicianSSN='$PrimaryPhysicianSSN' WHERE SSN='$SSNold'";
    $result1 = mysqli_query($conn, $sql);
    $_SESSION['Names'] = $Names;
    $_SESSION['SSN'] = $SSNnew;

    header("Location: ../dashboards/patient_dashboard.php");

}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Patient</title>
        <link rel="stylesheet" type="text/css" href="">
        <script type="text/javascript" src="../scripts.js"></script>

    </head>
    <body>
        <h1>Edit Patient Details</h1>
        <form method="post" action="">
            <label for="Username">Username: </label><br>
            <input type="text" name="Username" id="Username" required value="<?php echo $Username?>" readonly><br>
            <label for="SSN">Social Security Number:</label><br>
            <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN" value="<?php echo $SSNold?>"><br>
            <label for="Names">Name: </label><br>
            <input type="text" id="Names" name="Names" required placeholder="Enter your name here" value="<?php echo $Names?>"><br>
            <label for="Gender">Gender:</label><br>
            <select name="Gender" id="Gender" required>
                <option value="<?php echo $Gender?>" selected ><?php echo $Gender?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non-binary">Non-binary</option>
            </select><br>
            <label for="Allergies">Allergies:</label><br>
            <textarea name="Allergies" id="Allergies" cols="20" rows="10" ><?php echo $Allergies?></textarea><br>
            <label for="HeightinCm">Height (in centimetres):</label><br>
            <input type="text" id="HeightinCm" name="HeightinCm" placeholder="Enter your height" value="<?php echo $HeightinCm?>" required><br>
            <label for="WeightinKg">Weight (in kilograms):</label><br>
            <input type="text" id="WeightinKg" name="WeightinKg" placeholder="Enter your weight" value="<?php echo $WeightinKg?>" required><br>
            <label for="PatientAddress">Address:</label><br>
            <input type="text" name="PatientAddress" id="PatientAddress" required value="<?php echo $PatientAddress?>" placeholder="Enter your address"><br>
            <label for="DateOfBirth">Date of birth: </label><br>
            <input type="date" name="DateOfBirth" id="DateOfBirth" value="<?php echo $DateOfBirth?>" required><br>
            <label for="PrimaryPhysicianSSN">Primary Physician SSN:</label><br>
            <input type="text" id="PrimaryPhysicianSSN" name="PrimaryPhysicianSSN" value="<?php echo $PrimaryPhysicianSSN?>" required placeholder="Enter your physician's SSN"><br>
            <input type="submit" value="Submit"><br><br>
            <input type="reset" onclick="return confirm_reset();"><br><br>
            <button onclick="return cancel()">Cancel</button>
        </form>
    </body> 
</html>