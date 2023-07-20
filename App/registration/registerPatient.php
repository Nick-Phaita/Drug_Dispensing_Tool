<?php 
require_once("../signup.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Patient</title>
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
                <h1>Patient sign-up</h1>
            </div>
            <div class="right-container">
                <form method="post" action="register_patient.php">
                    <div class="field">
                        <label for="Username">Username: </label><br>
                        <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
                    </div>

                    <div class="field">
                        <label for="SSN">Social Security Number:</label><br>
                        <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN"><br>
                    </div>

                    <div class="field">
                        <label for="Names">Name: </label><br>
                        <input type="text" id="Names" name="Names" required placeholder="Enter your name here"><br>
                    </div>

                    <div class="field">
                        <label for="Gender">Gender:</label><br>
                        <select name="Gender" id="Gender" required>
                            <option value="" selected hidden >Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non-binary">Non-binary</option>
                        </select><br>
                    </div>

                    <div class="field">
                        <label for="HeightinCm">Height (in centimetres):</label><br>
                        <input type="text" id="HeightinCm" name="HeightinCm" placeholder="Enter your height" required><br>
                    </div>

                    <div class="field">
                        <label for="WeightinKg">Weight (in kilograms):</label><br>
                        <input type="text" id="WeightinKg" name="WeightinKg" placeholder="Enter your weight" required><br>
                    </div>

                    <div class="field-txtarea">
                        <label for="Allergies">Allergies:</label><br>
                        <textarea name="Allergies" id="Allergies" cols="20" rows="10"></textarea><br>
                    </div>


                    <div class="field">
                        <label for="PatientAddress">Address:</label><br>
                        <input type="text" name="PatientAddress" id="PatientAddress" required placeholder="Enter your address"><br>
                    </div>

                    <div class="field">
                        <label for="DateOfBirth">Date of birth: </label><br>
                        <input type="date" name="DateOfBirth" id="DateOfBirth" required><br>
                    </div>

                    <div class="field">
                        <label for="PrimaryPhysicianSSN">Primary Physician SSN:</label><br>
                        <input type="text" id="PrimaryPhysicianSSN" name="PrimaryPhysicianSSN" required placeholder="Enter your physician's SSN"><br>
                    </div>

                    <input class="button" type="submit" value="Submit">
                    <input class="button" type="reset" onclick="return confirm_reset();">
                    <button class="button" onclick="cancel()">Cancel</button>
                </form>

            </div>
            
            
        </div>

    </body> 
</html>