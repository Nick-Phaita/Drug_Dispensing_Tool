<?php 
require_once("../signup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Supervisor</title>
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
                    <h1>Supervisor sign-up</h1>
                </div> 

            <div class="right-container">
                    <form action="register_supervisor.php" method="post">
                        <div class="field">
                        <label for="Username">Username: </label><br>
                        <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
                        </div>

                        <div class="field">
                        <label for="">SSN:</label><br>
                        <input type="number" name="SSN" id="SSN" placeholder="Enter your SSN" required><br>
                        </div>

                        <div class="field">
                        <label for="">Name:</label><br>
                        <input type="text" name="Names" id="Names" placeholder="Enter your name" required><br>
                        </div>

                        <div class="field">
                        <label for="PharmacyID">Pharmacy ID:</label><br>
                        <?php 
                            $sql = "SELECT PharmacyID FROM Pharmacy";
                            $result = $conn-> query($sql);
                            
                        ?>
                        <select name="PharmacyID" id="PharmacyID">
                            <option value="" selected hidden>Pick the pharmacy</option>
                            <?php
                                // use a while loop to fetch data
                                // from the $all_categories variable
                                // and individually display as an option
                                while ($category = mysqli_fetch_array(
                                        $result,MYSQLI_ASSOC)):;
                            ?>
                                <option value="<?php echo $category['PharmacyID'];
                                    // The value we usually set is the primary key
                                ?>">
                                    <?php echo $category['PharmacyID'];
                                        // To show the category name to the user
                                    ?>
                                </option>
                            <?php
                                endwhile;
                                // While loop must be terminated
                            ?>
                        </select><br><br>
                        </div>

                        <input class="button" type="submit" name="Submit">


                    </form>
            </div>
    </div>
</body>
</html>