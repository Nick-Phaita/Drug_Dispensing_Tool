<?php 
require_once("../signup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
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
                <h1>Admin sign-up</h1>
            </div>
            <div class="right-container">
                <form action="register_admin.php" method="post">
                    <div class="field">
                    <label for="Username">Username: </label><br>
                    <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
                    </div>

                    <div class="field">
                    <label for="Names">Name:</label><br>
                    <input type="text" name="Names" id="Names" required placeholder="Enter your name"><br>
                    </div>

                    <div class="field">
                    <label for="EmailAddress">Email Address:</label><br>
                    <input type="email" name="EmailAddress" id="EmailAddress" required placeholder="Enter your email address"><br>
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