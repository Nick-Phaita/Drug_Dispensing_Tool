<?php 
require_once("../signup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Supervisor</title>
</head>
<body>
    <h1>Supervisor sign-up</h1>
    <form action="register_supervisor.php" method="post">
        <label for="Username">Username: </label><br>
        <input type="text" name="Username" id="Username" required value="<?php echo $_SESSION['Username']?>" readonly><br>
        <label for="">SSN:</label><br>
        <input type="number" name="SSN" id="SSN" placeholder="Enter your SSN" required><br>
        <label for="">Name:</label><br>
        <input type="text" name="Names" id="Names" placeholder="Enter your name" required><br>
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
        <input type="submit" name="Submit">


    </form>
</body>
</html>