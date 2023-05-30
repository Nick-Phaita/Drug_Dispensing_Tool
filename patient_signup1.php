<?php
require_once("connection.php");

try{
if($_SERVER["REQUEST_METHOD"]== "POST"){
$SSN = $_POST["SSN"];
$Names = $_POST["Names"];
$Gender = $_POST["Gender"];
$Allergies = $_POST["Allergies"];
$HeightinCm = $_POST["HeightinCm"];
$WeightinKg = $_POST["WeightinKg"];
$PatientAddress = $_POST["PatientAddress"];
$DateOfBirth = $_POST["DateOfBirth"];
$UserPassword = $_POST["UserPassword"];

$sql = "INSERT INTO Patients (SSN,Names,Gender,Allergies,HeightinCm,WeightinKg,PatientAddress,DateOfBirth,UserPassword)
VALUES ('$SSN','$Names','$Gender','$Allergies','$HeightinCm','$WeightinKg','$PatientAddress','$DateOfBirth','$UserPassword')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Illegal input')</script>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>

    </head>
    <body>
        <h2>Patient form</h2>
        <form method="post" action="">
            <label for="SSN">Social Security Number:</label><br>
            <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN"><br>
            <label for="Names">Name: </label><br>
            <input type="text" id="Names" name="Names" required placeholder="Enter your name here"><br>
            <label for="Gender">Gender:</label><br>
            <select name="Gender" id="Gender" required>
                <option value="" selected hidden >Choose Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non-binary">Non-binary</option>
            </select><br>
            <label for="Allergies">Allergies:</label><br>
            <textarea name="Allergies" id="Allergies" cols="20" rows="10"></textarea><br>
            <label for="HeightinCm">Height (in centimetres):</label><br>
            <input type="text" id="HeightinCm" name="HeightinCm" placeholder="Enter your height" required><br>
            <label for="WeightinKg">Weight (in kilograms):</label><br>
            <input type="text" id="WeightinKg" name="WeightinKg" placeholder="Enter your weight" required><br>
            <label for="PatientAddress">Address:</label><br>
            <input type="text" name="PatientAddress" id="PatientAddress" required placeholder="Enter your address"><br>
            <label for="DateOfBirth">Date of birth: </label><br>
            <input type="date" name="DateOfBirth" id="DateOfBirth" required><br>
            <label for="UserPassword">Password: </label><br>
            <input type="password" name="UserPassword" id="UserPassword" required placeholder="Enter your password"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body> 
</html>