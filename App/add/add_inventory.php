<?php
require_once("../connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <!--<link rel="stylesheet" type="text/css" href="../styles/form.css">-->
        <script type="text/javascript" src="../scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/form.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <link rel="stylesheet" type="text/css" href="styles/login-signup_form.css">
</head>
<body>
    <div class="form">
            <div class="left-container">
                        <div class="icon">
                            <h2 class="logo">Dispenzer</h2>
                        </div>
                        <h1>Add Inventory</h1>
             </div>
        <div class="right-container">

            <form action="" method="post">
                <div class="field">
                    <label for="PharmacyID">Pharmacy ID:</label><br>
                    <input type="text" id="PharmacyID" name="PharmacyID" value="<?php echo $_SESSION['PharmacyID']?>" required><br>
                </div>

                <div class="field">
                    <label for="TradeName">Drug Trade Name:</label><br>
                    <?php 
                        $sql = "SELECT TradeName FROM Drugs";
                        $result = $conn-> query($sql);
                        
                    ?>
                    <select name="TradeName" id="TradeName">
                        <option value="" selected hidden>Select the drug</option>
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
                    <input type="text" name="Price" id="Price" placeholder="Enter the price" required><br>
                </div>

                <div class="field">
                    <label for="ExpirationDate">Expiration Date:</label><br>
                    <input type="date" name="ExpirationDate" id="ExpirationDate" placeholder="Enter the expiration date" required><br>
                </div>

                <div class="field">
                    <label for="Stock">Quantity in Stock:</label><br>
                    <input type="number" name="Stock" id="Stock" placeholder="Enter the quantity" required><br>
                </div>

                <div class="field-bt">

                <input class="button" type="submit" value="Submit">
                <input  class="button" type="reset" onclick="return confirm_reset();"><br><br>
                <input  class="button" type="cancel" onclick="return cancel()"  value="Cancel">
        
                </div>
            </form>

        </div>
    </div>
</body>
</html>

<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $PharmacyID = $_POST["PharmacyID"];
        $TradeName = $_POST["TradeName"];
        $Price = $_POST["Price"];
        $ExpirationDate = $_POST["ExpirationDate"];
        $Stock = $_POST["Stock"];
        

       $sql="INSERT INTO Inventory (PharmacyID, TradeName, Price, ExpirationDate, Stock) 
       VALUES ('$PharmacyID','$TradeName','$Price','$ExpirationDate', $Stock)";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    
    header("Location: ../dashboards/supervisor_dashboard.php");

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>