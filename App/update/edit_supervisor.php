<?php 
require_once("../connection.php");
session_start(); 

$SSNold = $SSNnew = "";
$Names = "";
$PharmacyID = "";
$Username = "";

$SSNold = $_SESSION['SSN'];

$sql = "SELECT * FROM Supervisor WHERE SSN = '$SSNold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$SSNold = $row["SSN"];
$Names = $row["Names"];
$PharmacyID = $row["PharmacyID"];
$Username = $row["Username"];

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $SSNnew = $_POST["SSN"];
    $Names = $_POST["Names"];
    $PharmacyID = $_POST["PharmacyID"];
    $Username = $_POST["Username"];

    $sql="UPDATE Supervisor SET SSN='$SSNnew', Names='$Names', PharmacyID='$PharmacyID'
     WHERE SSN='$SSNold'";

    $result1 = mysqli_query($conn, $sql);
    $_SESSION['Names'] = $Names;
    $_SESSION['SSN'] = $SSNnew;

    header("Location: ../dashboards/supervisor_dashboard.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supervisor</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Edit Supervisor Details</h1>
    <form action="" method="post">
        <label for="Username">Username: </label><br>
        <input type="text" name="Username" id="Username" required value="<?php echo $Username?>" readonly><br>
        <label for="">SSN:</label><br>
        <input type="number" name="SSN" id="SSN" value="<?php echo $SSNold?>" placeholder="Enter your SSN" required><br>
        <label for="">Name:</label><br>
        <input type="text" name="Names" id="Names" value="<?php echo $Names?>" placeholder="Enter your name" required><br>
        <label for="PharmacyID">Pharmacy ID:</label><br>
        <?php 
            $sql = "SELECT PharmacyID FROM Pharmacy";
            $result = $conn-> query($sql);
            
        ?>
        <select name="PharmacyID" id="PharmacyID">
            <option value="<?php echo $PharmacyID?>" selected><?php echo $PharmacyID?></option>
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
        <input type="submit" name="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="return cancel()">Cancel</button>


    </form>
</body>
</html>