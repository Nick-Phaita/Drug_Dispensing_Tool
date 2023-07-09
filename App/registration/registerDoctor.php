<?php 
require_once("../signup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Doctor</title>
</head>
<body>
    <h1>Doctor sign-up</h1>
    <form action="register_doctor.php" method="post">
        <label for="Username">Username: </label><br>
        <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
        <label for="SSN">Social Security Number:</label><br>
        <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN"><br>
        <label for="Names">Name:</label><br>
        <input type="text" name="Names" id="Names" required placeholder="Enter your name"><br>
        <label for="Speciality">Speciality:</label><br>
        <input type="text" name="Speciality" id="Speciality" required placeholder="Enter your specialty"><br>
        <label for="YearsOfExperience">Years of experience:</label><br>
        <input type="number" id="YearsOfExperience" name="YearsOfExperience" required placeholder="Enter years"><br>
        <label for="LicenseNo">Medical License Number: </label><br>
        <input type="text" name="LicenseNo" id="LicenseNo" required placeholder="Enter your license number"><br>
        <label for="PhoneNo">Phone Number: </label><br>
        <input type="text" name="PhoneNo" id="PhoneNo" required placeholder="Enter your phone number"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>