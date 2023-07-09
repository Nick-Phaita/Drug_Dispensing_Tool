<?php 
require_once("../signup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pharmaceutical Company</title>
</head>
<body>
    <h1>Pharmaceutical Company sign-up</h1>
    <form action="register_pharmaco.php" method="post">
        <label for="Username">Username: </label><br>
        <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
        <label for="CompanyID">Company ID:</label><br>
        <input type="text" name="CompanyID" id="CompanyID" placeholder="Enter your company ID" required><br>
        <label for="">Company Name:</label><br>
        <input type="text" name="CompanyName" id="CompanyName" placeholder="Enter your company name" required><br>
        <label for="">Phone No:</label><br>
        <input type="text" name="PhoneNo" id="PhoneNo" placeholder="Enter the company contact" required>
        <br><br>
        <input type="submit" name="Submit">


    </form>
</body>
</html>