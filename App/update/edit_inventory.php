<?php
require_once("../connection.php");
session_start();

$PharmacyID = "";
$TradeName = "";
$Price = "";
$ExpirationDate = "";
$Stock = "";

$PharmacyID = $_GET["PharmacyID"];
$sql="SELECT * FROM Inventory WHERE PharmacyID='$PharmacyID'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$PharmacyID = $row["PharmacyID"];
$TradeName = $row["TradeName"];
$Price = $row["Price"];
$ExpirationDate = $row["ExpirationDate"];
$Stock = $row["Stock"];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $PharmacyID = $_POST["PharmacyID"];
    $TradeName = $_POST["TradeName"];
    $Price = $_POST["Price"];
    $ExpirationDate = $_POST["ExpirationDate"];
    $Stock = $_POST["Stock"];

    $sql="UPDATE Inventory SET Price='$Price', ExpirationDate='$ExpirationDate', Stock = '$Stock'
        WHERE PharmacyID='$PharmacyID'";

    $result = mysqli_query($conn, $sql);
        
    if($result){
        header("Location: ../view/view_inventory.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
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
                            <h1>Edit inventory</h1>
                </div>
            
            <div class="right-container">
              <form action="" method="post">
                <div class="field">
                <label for="PharmacyID">Pharmacy ID:</label><br>
                <input type="text" id="PharmacyID" name="PharmacyID" value="<?php echo $PharmacyID?>" required><br>
                </div>

                <div class="field">
                <label for="TradeName">Drug Trade Name:</label><br>
                <?php 
                    $sql = "SELECT TradeName FROM Drugs";
                    $result = $conn-> query($sql);
                    
                ?>
                <select name="TradeName" id="TradeName">
                    <option value="<?php echo $TradeName?>" selected hidden><?php echo $TradeName?></option>
                    <?php
                        // use a while loop to fetch data
                        // from the $all_categories variable
                        // and individually display as an option
                        while ($category = mysqli_fetch_array(
                                $result,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $category['TradeName'];
                            // The value we usually set is the primary key
                        ?>">
                            <?php echo $category['TradeName'];
                                // To show the category name to the user
                            ?>
                        </option>
                    <?php
                        endwhile;
                        // While loop must be terminated
                    ?>
                </select><br>
                </div>

                <div class="field">
                <label for="Price">Selling Price per unit:</label><br>
                <input type="text" name="Price" id="Price" value="<?php echo $Price?>" placeholder="Enter the price" required><br>
                </div>

                <div class="field">
                <label for="ExpirationDate">Expiration Date:</label><br>
                <input type="date" name="ExpirationDate" id="ExpirationDate" value="<?php echo $ExpirationDate?>" placeholder="Enter the expiration date" required><br>
                </div>

                <div class="field">
                <label for="Stock">Quantity in Stock:</label><br>
                <input type="number" name="Stock" id="Stock" value="<?php echo $Stock?>" placeholder="Enter the quantity" required><br>
                </div>
                <br>
                <input class="button" type="submit" value="Submit">
                <input class="button" type="reset" onclick="return confirm_reset();">
                <input class="button" type="button" onclick="return cancel()" value="Cancel" >
              </form>
            </div>
    </div>
</body>
</html>