<?php 
require_once("../signup.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Patient</title>
        <link rel="stylesheet" type="text/css" href="">

    </head>
    <body>
        <h1>Patient sign-up</h1>
        <form method="post" action="register_patient.php">
            <label for="Username">Username: </label><br>
            <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
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
            <input type="submit" value="Submit">
        </form>
    </body> 
</html>