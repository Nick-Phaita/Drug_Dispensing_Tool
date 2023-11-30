<?php
require_once("../connection.php");
session_start();

$TradeNameOld = $TradeNameNew = "";
$Formula = "";
$CompanyID = "";
$Category = "";

$TradeNameOld = $_GET["TradeName"];
$sql="SELECT * FROM Drugs WHERE TradeName='$TradeNameOld'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$TradeNameOld = $row["TradeName"];
$Formula = $row["Formula"];
$CompanyID = $row["CompanyID"];
$Category = $row["dcategory"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $TradeNameNew = $_POST["TradeName"];
    $Formula = $_POST["Formula"];
    $CompanyID = $_POST["CompanyID"];
    $Category = $_POST["Category"];

    $sql="UPDATE Drugs SET TradeName='$TradeNameNew', Formula = '$Formula',
        CompanyID = '$CompanyID', dcategory = '$Category' WHERE TradeName='$TradeNameOld'";

    $result = mysqli_query($conn, $sql);
        
    if($result){
        header("Location: ../view/view_drugs.php");
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Drugs</title>
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
                            <h1>Edit Drugs</h1>
                </div>

        
        <div class="right-container">
            <form action="" method="post">
                <div class="field">
                <label for="TradeName">Drug Trade Name:</label><br>
                <input type="text" id="TradeName" name="TradeName" value="<?php echo $TradeNameOld?>" placeholder="Enter the drug trade name" required><br>
                </div>

                <div class="field">
                <label for="Formula">Formula:</label><br>
                <input type="text" id="Formula" name="Formula" value="<?php echo $Formula?>" placeholder="Enter the formula" required><br>
                </div>

                <div class="field">
                <label for="CompanyID">Company ID:</label><br>
                <input type="text" name="CompanyID" id="CompanyID" value="<?php echo $CompanyID?>" required><br>
                </div>

                <div class="field">
        <label for="Category">Category</label>
        <?php 
            $sql = "SELECT cname FROM dcategory";
            $result = $conn-> query($sql);    
            ?>
            <select name="Category" id="Category">
            <option value="<?php echo $Category?>" selected hidden><?php echo $Category?></option>
                        <?php
                            while ($category = mysqli_fetch_array(
                                    $result,MYSQLI_ASSOC)):;
                        ?>
                            <option value="<?php echo $category['cname'];
                                // The value we usually set is the primary key
                            ?>">
                                <?php echo $category['cname'];
                                    // To show the category name to the user
                                ?>
                            </option>
                        <?php
                            endwhile;
                            // While loop must be terminated
                        ?>
                    </select><br>
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