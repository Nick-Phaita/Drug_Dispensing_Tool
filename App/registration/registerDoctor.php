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
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <!--<link rel="stylesheet" type="text/css" href="../styles/form.css">-->
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
                <h1>Doctor sign-up</h1>
            </div>
            <div class="right-container">
                <form action="register_doctor.php" method="post">
                    <div class="field">
                    <label for="Username">Username: </label><br>
                    <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
                    </div>

                    <div class="field">
                    <label for="SSN">Social Security Number:</label><br>
                    <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN"><br>
                    </div>

                    <div class="field">
                    <label for="Names">Name:</label><br>
                    <input type="text" name="Names" id="Names" required placeholder="Enter your name"><br>
                    </div>

                    <div class="field">
                    <label for="Speciality">Speciality:</label><br>
                    <input type="text" name="Speciality" id="Speciality" required placeholder="Enter your specialty"><br>
                    </div>

                    <div class="field">
                    <label for="YearsOfExperience">Years of experience:</label><br>
                    <input type="number" id="YearsOfExperience" name="YearsOfExperience" required placeholder="Enter years"><br>
                    </div>

                    <div class="field">
                    <la bel for="LicenseNo">Medical License Number: </la><br>
                    <input type="text" name="LicenseNo" id="LicenseNo" required placeholder="Enter your license number"><br>
                    </div>

                    <div class="field">
                    <label for="PhoneNo">Phone Number: </label><br>
                    <input type="text" name="PhoneNo" id="PhoneNo" required placeholder="Enter your phone number"><br><br>
                    </div>
                    <br>
                    <input class="button" type="submit" value="Submit">
                </form>
            </div>
    </div>
</body>
</html>